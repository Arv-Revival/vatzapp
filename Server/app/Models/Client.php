<?php

namespace App\Models;

use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'building_name',
        'p_o_box',
        'palce',
        'city',
        'country_id',
        'region_id',
        'trade_license_number',
        'trade_license_image_id',
        'trade_license_expiry' => 'date',
        'trn_number',
        'fta_email',
        'fta_password',
        'verified_on',
        'country_code',
        'mobile',
        'l_country_code',
        'landline',
        'contact_person',
        'cp_country_code',
        'cp_mobile',
        'tran_certificate_id',
        'checker_user_id',
        'vat_period',
        'vat_percentage',
        'plan_name',
        'ref',
        'from',
        'to',
        'payment_type',
        'payment_date',
        'payment_amount',
        'payment_currency',
        'payment_url',
        'start_month',
        'start_year'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified_on' => 'datetime',
        'from' => 'datetime',
        'to' => 'datetime',
        'payment_date' => 'datetime',
    ];

    /**
     * Is verifies user?
     *
     * @return bool
     */
    public function isVerified()
    {
        return ($this->verified_on != null);
    }

    /**
     * Is checker assigned?
     *
     * @return bool
     */
    public function isCheckerAssigned()
    {
        return ($this->checker_user_id > 0);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function checker()
    {
        return $this->hasOne(User::class, 'id', 'checker_user_id');
    }

    /**
     * Get the country.
     */
    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    /**
     * Get the region.
     */
    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    public function tradeLicenseImage()
    {
        return $this->hasOne(File::class, 'id', 'trade_license_image_id');
    }

    public function tranCertificateImage()
    {
        return $this->hasOne(File::class, 'id', 'tran_certificate_id');
    }

    /**
     * Set client verified
     *
     */
    public function setVerified()
    {
        $this->verified_on = date("Y-m-d");
    }
    public function setTradeLicenseExpiry($trade_license_expiry)
    {
        $this->trade_license_expiry = $trade_license_expiry;
    }

    public function get_current_vat_period()
    {
        $current_date = date_create_from_format('Y-m-d', date('Y-m-01'));
        $period = new \stdClass();
        $period->start_period_date = date_create_from_format('Y-m-d', date('Y-m-01'));
        $period->end_period_date = date_create_from_format('Y-m-d', date('Y-m-01'));

        if ($this->start_year > 0 && $this->start_month > 0) {
            $start_date = date_create_from_format('Y-m-d', $this->start_year . '-' . $this->start_month . '-' . 1);

            if ($current_date >= $start_date) {

                $interval =  (array) date_diff($current_date, $start_date);
                $total_months = $interval["y"] * 12 + $interval["m"];
                $current_period_index = (int)($total_months / $this->vat_period);
                $vat_start_month = $current_period_index * $this->vat_period;

                $start_period_date = new DateTime($start_date->format('Y-m-01'));
                $start_period_date->add(new DateInterval('P' . $vat_start_month . 'M'));

                $end_period_date = new DateTime($start_period_date->format('Y-m-01'));
                $end_period_date->add(new DateInterval('P' . $this->vat_period . 'M'));
                $end_period_date->sub(new DateInterval('P' . 1 . 'D'));

                $period->start_period_date = $start_period_date;
                $period->end_period_date = $end_period_date;
            }
        }

        return $period;
    }
}
