<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/api/file/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::O4F8yWDWmGovhPFQ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/file/download' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7HRHpsY894I8FKiz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/file/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dZtHDMMphiXJDrPA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1bKFxr65herCen9J',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/employeelogin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cqMxh2Qif8cKmelf',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/getuser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7j3FefEUJvoLlmqp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bT8SFGagGx19u9WJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/changepassword' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::prM2Wh3HImc6d5WY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::puyJFZQY5shOAMwl',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6fOESNNecQqHpcMN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ffQlY0PAPMeLkWWL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oZ7yuwGyogQzSnk6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/expirydatelist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wjzEGk0SwHlLmWTM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/tradelicenseexpirydate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yoZUTC2hi7MV21XI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/approveuser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MCNBsWAGNUiKQh6I',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/updatetradelicenseexpiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lMSuRnN7tjJrTmFa',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/activateuser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F8dGezyi9bu175QC',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/deactivateuser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Y5FpPs4djgJgebJT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/updateclient' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XmS4ks0BhxeOnVpw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mh6hj9o2brfpGAju',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/updatebyadmin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LiKAh0ltPBKyM5v6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/dashboardsummary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qCmd5phmupmYvwpj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/clientshortlistbyadmin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zMPyCNrBngK92xm5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/validator/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hxKMpVtjtZWVn3yT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/validator/shortlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vLBZROWFaBr1uMbr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/validator/checkerslist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ept5kRfikGiAscbo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/validator/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4kjLCxuWZDG7L2AY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/validator/updatebyadmin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yEaaNE1EW58QPMsL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/validator/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WxXOyEM7bRje84z4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/validator/dashboardsummary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MKdXeA2sywDCmdUE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/validator/dashboardrecenttile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rO68u2gx2QIFdj6B',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/validator/clientshortlistbyvalidator' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7yaSE5szENnXoz8n',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checker/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xgYj0XgGfavGinpY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checker/shortlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8LRybR7IvT04BhR0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checker/clientlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WO8YH09E7rMPrjlQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checker/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::y11cWs7KoiScofjc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checker/updatebyadmin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::muauWULe5uwE4y3e',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checker/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dZrGZX0HE7Uep6dt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checker/dashboardsummary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::768W9YIDCC1dS0DA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checker/dashboardrecenttile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ITFsOseTN2NU52BK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checker/clientshortlistbychecker' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bHjCSlD90uhPlIji',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qaSVy0JmEXt3KVcg',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::o0CCzLaqId5iUJy2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/getclient' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1Ep4UHEvmYGokIp9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/vatexpirydate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bBmcKSJ58jTRtYrT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/addpaymentlink' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fuWKpvxdv27diCxo',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/deletepaymentlink' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KvIlef8vA0UOi1Kp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/getpaymentlink' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Tg7i2e2FV8wd5QRH',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/updatebyadmin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::k8h0ATfGR0N8oxGZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IKhBluv9iqCl2Xe2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/dashboardsummary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1IGHW3zirdsTAGBa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/clientmonthwisegraph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5KmxO4kXKuW6JiC4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/currentvatperiod' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OI8sdcJkhjNDywe4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/client/sendemail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GsRhgLtDGcCHMlPm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/country/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BtkHl8V9LZzaPieR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/country/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gC555hVzjdXM1CUy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/country/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YWXfNpC8wu14XuVM',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/country/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oFkOB2APH03qTjbF',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/region/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lnUIVFkzU0Ae7P97',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/region/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tTEdQRPlKIVr4rqw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/region/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Kbj1L8bKZY8Mm68k',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/region/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Yib9DiW7lhpJIURg',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/plan/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RzKEctbCzl0zzQog',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/plan/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NkVvF81v8ioygVW4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/supplier/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VgY05qB28JwUeQTI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/supplier/topsixsupplierslist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4nahKrdumzrbqqPI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/supplier/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::b5s1i7dxF4Hb5MLM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/supplier/shortlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GMUbXrxapUH7NsBW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/supplier/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gt9uuMyw7T8UPsfs',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/supplier/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dSNE0w6EBoNdigQb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3MJjmCdx0Q6O7A1M',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/clientpendinglist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5C2091BjGl42en0s',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/checkerapprovedlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lKnDgbC4P2U0C4xw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/checkerpendinglist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0uKYlsuEnvO0F0ob',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/checkerrejectedlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6LbaxAq5Pb2ipdNT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/validatorapprovedlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GhBBhzvuM4TdiB0q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/validatorpendinglist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::znnBNFFJDEA6fsZb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/validatorrejectedlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XCm2mxd90CFBhUzZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/setvalidatorstatus' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K4cACuiF02kYmBly',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/setcheckerstatus' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::X3iTfcPGf3s0ANSf',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/clientrecentlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0e3bpEZIqH7MxodP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/clientdeleteentry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::u7AwjDOFJnjC8ZWB',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/clientrequestfordelete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uftdLbElVHTlwC4F',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/validatordeleteentry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Tz4TUeiF1apwGZVm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/checkinvoicenumberexists' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rzhkOfHJWcYrUYPe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/checkercheckedlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JcNBvoCmMoYq1YpG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/checkernoentrylist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xSwMyC0ULqzdnPKh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/validatorcheckedlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zewGsNSg4GFkLCEK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/clientdaywisesummary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6WFvM0RMLLqew3r9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/clientapprovedlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DzudbCAcHvZEObQA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/clientrejectedlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KqSphjM0WGRxsBAS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/admincheckerpendinglist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FSmdZ3OlpJd7SgK4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/admincheckerrejectedlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sGHOgEfQYOQgggEg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/adminvalidatorpendinglist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dJ7pMqRCYfjxsgIN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/admincheckedlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8GaMy40BvIzOzDI2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/invoiceexpgroups' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HMOJPSG9xITGsysL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/invoicepurchasegroups' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZUYl4rpwBfsBp2Dp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/checkerlastweeksgraph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3HWpfZs0mFjUCrI7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/validatorlastweeksgraph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ma7cgqbO7nhphPpC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/clientmonthwisegraph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZZGT3Gre4BAsFrIp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/adminlastweeksgraph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YWUGhRMqOxpf5ssG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/checkervatpayablegraph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7P8tItHaSzZqp9YJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/validatorvatpayablegraph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M3v0OtkWmzReAkMH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/entry/adminvatpayablegraph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wTjc1QioZs70PPRt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sale/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GatXNaMYXeRNPE1L',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sale/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s34vHeOvoHjMmdWp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sale/clientsalesreport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0cTgeANsVeaQTyn4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/expenditure/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::InXbjMK91zUNYtQc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/expenditure/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OWNyQiE9KnglOWir',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/expenditure/clientexpenditurereport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LLRY6jKapGvlFxEd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/purchase/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nzIdByJuCcGCp4dC',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/purchase/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EJ9jsHigRqDP1BD2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/purchase/clientpurchasesreport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZlWcSOtltW4hZtYr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vatreport/vatreportperiodsforclient' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sR1U5i9FQm97YGtY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vatreport/vatreportperiodsforothers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uhIYzb2RQEllxoJ2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vatreport/updatevatreportvalidator' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wghrOTa3hWC3RWl0',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vatreport/vatreportforvalidator' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tXkUSIiB3XSToM3y',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vatreport/vatreportforvalidatorbyid' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lu0Tpy4PlwFJuUHW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vatreport/vatreportforclient' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rPaiZb25nyEgMJFE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vatreport/vatreportforothers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8bM3gQl728sJBqty',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vatreport/createvatreport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5Ui2lvMUv6pwGP3D',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vatreport/updatevatreport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VZuR0EXlLI4zHpl8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/message/send' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5kxFJrPSXg8gd6WA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/message/contacts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4hwy41AOYqe5dfDT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/message/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qzBewxJk69W9Vpv8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/message/getallmessages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4HGRo8VZIBUwYz56',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pOB3Jb3QsFvhCQuz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/email/sendemailverification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.send',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/forgotpassword' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.sent',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/email/verify/([^/]++)/([^/]++)(*:38)|/reset\\-password/([^/]++)(*:70))/?$}sDu',
    ),
    3 => 
    array (
      38 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.verify',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'hash',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      70 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::O4F8yWDWmGovhPFQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/file/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FileController@upload',
        'controller' => 'App\\Http\\Controllers\\FileController@upload',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/file',
        'where' => 
        array (
        ),
        'as' => 'generated::O4F8yWDWmGovhPFQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7HRHpsY894I8FKiz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/file/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FileController@download',
        'controller' => 'App\\Http\\Controllers\\FileController@download',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/file',
        'where' => 
        array (
        ),
        'as' => 'generated::7HRHpsY894I8FKiz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::dZtHDMMphiXJDrPA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/file/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FileController@view',
        'controller' => 'App\\Http\\Controllers\\FileController@view',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/file',
        'where' => 
        array (
        ),
        'as' => 'generated::dZtHDMMphiXJDrPA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1bKFxr65herCen9J' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::1bKFxr65herCen9J',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::cqMxh2Qif8cKmelf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/employeelogin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@employee_login',
        'controller' => 'App\\Http\\Controllers\\AuthController@employee_login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::cqMxh2Qif8cKmelf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7j3FefEUJvoLlmqp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/auth/getuser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@user_get',
        'controller' => 'App\\Http\\Controllers\\AuthController@user_get',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::7j3FefEUJvoLlmqp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bT8SFGagGx19u9WJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/auth/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@profile',
        'controller' => 'App\\Http\\Controllers\\AuthController@profile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::bT8SFGagGx19u9WJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::prM2Wh3HImc6d5WY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/changepassword',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@change_password',
        'controller' => 'App\\Http\\Controllers\\AuthController@change_password',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::prM2Wh3HImc6d5WY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::puyJFZQY5shOAMwl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::puyJFZQY5shOAMwl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6fOESNNecQqHpcMN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/auth/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@refresh',
        'controller' => 'App\\Http\\Controllers\\AuthController@refresh',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::6fOESNNecQqHpcMN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ffQlY0PAPMeLkWWL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@register',
        'controller' => 'App\\Http\\Controllers\\AdminController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ffQlY0PAPMeLkWWL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::oZ7yuwGyogQzSnk6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@list',
        'controller' => 'App\\Http\\Controllers\\AdminController@list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::oZ7yuwGyogQzSnk6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wjzEGk0SwHlLmWTM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/expirydatelist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@portal_expiry',
        'controller' => 'App\\Http\\Controllers\\AdminController@portal_expiry',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::wjzEGk0SwHlLmWTM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::yoZUTC2hi7MV21XI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/tradelicenseexpirydate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@trade_license_expiry_date',
        'controller' => 'App\\Http\\Controllers\\AdminController@trade_license_expiry_date',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::yoZUTC2hi7MV21XI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::MCNBsWAGNUiKQh6I' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/approveuser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@approve_user',
        'controller' => 'App\\Http\\Controllers\\AdminController@approve_user',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::MCNBsWAGNUiKQh6I',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::lMSuRnN7tjJrTmFa' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/admin/updatetradelicenseexpiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@update_trade_license_expiry',
        'controller' => 'App\\Http\\Controllers\\AdminController@update_trade_license_expiry',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::lMSuRnN7tjJrTmFa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::F8dGezyi9bu175QC' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/activateuser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@activate_user',
        'controller' => 'App\\Http\\Controllers\\AdminController@activate_user',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::F8dGezyi9bu175QC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Y5FpPs4djgJgebJT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/deactivateuser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@deactivate_user',
        'controller' => 'App\\Http\\Controllers\\AdminController@deactivate_user',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Y5FpPs4djgJgebJT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XmS4ks0BhxeOnVpw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/updateclient',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@update_client',
        'controller' => 'App\\Http\\Controllers\\AdminController@update_client',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::XmS4ks0BhxeOnVpw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::mh6hj9o2brfpGAju' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@update',
        'controller' => 'App\\Http\\Controllers\\AdminController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::mh6hj9o2brfpGAju',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::LiKAh0ltPBKyM5v6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/updatebyadmin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@update_by_admin',
        'controller' => 'App\\Http\\Controllers\\AdminController@update_by_admin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::LiKAh0ltPBKyM5v6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qCmd5phmupmYvwpj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/dashboardsummary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@dashboard_summary',
        'controller' => 'App\\Http\\Controllers\\AdminController@dashboard_summary',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::qCmd5phmupmYvwpj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zMPyCNrBngK92xm5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/clientshortlistbyadmin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@client_short_list_by_admin',
        'controller' => 'App\\Http\\Controllers\\AdminController@client_short_list_by_admin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::zMPyCNrBngK92xm5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::hxKMpVtjtZWVn3yT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/validator/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidatorController@register',
        'controller' => 'App\\Http\\Controllers\\ValidatorController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/validator',
        'where' => 
        array (
        ),
        'as' => 'generated::hxKMpVtjtZWVn3yT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::vLBZROWFaBr1uMbr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/validator/shortlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidatorController@short_list',
        'controller' => 'App\\Http\\Controllers\\ValidatorController@short_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/validator',
        'where' => 
        array (
        ),
        'as' => 'generated::vLBZROWFaBr1uMbr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ept5kRfikGiAscbo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/validator/checkerslist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidatorController@checker_list_by_validator',
        'controller' => 'App\\Http\\Controllers\\ValidatorController@checker_list_by_validator',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/validator',
        'where' => 
        array (
        ),
        'as' => 'generated::ept5kRfikGiAscbo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4kjLCxuWZDG7L2AY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/validator/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidatorController@list',
        'controller' => 'App\\Http\\Controllers\\ValidatorController@list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/validator',
        'where' => 
        array (
        ),
        'as' => 'generated::4kjLCxuWZDG7L2AY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::yEaaNE1EW58QPMsL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/validator/updatebyadmin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidatorController@update_by_admin',
        'controller' => 'App\\Http\\Controllers\\ValidatorController@update_by_admin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/validator',
        'where' => 
        array (
        ),
        'as' => 'generated::yEaaNE1EW58QPMsL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::WxXOyEM7bRje84z4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/validator/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidatorController@update',
        'controller' => 'App\\Http\\Controllers\\ValidatorController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/validator',
        'where' => 
        array (
        ),
        'as' => 'generated::WxXOyEM7bRje84z4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::MKdXeA2sywDCmdUE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/validator/dashboardsummary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidatorController@dashboard_summary',
        'controller' => 'App\\Http\\Controllers\\ValidatorController@dashboard_summary',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/validator',
        'where' => 
        array (
        ),
        'as' => 'generated::MKdXeA2sywDCmdUE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rO68u2gx2QIFdj6B' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/validator/dashboardrecenttile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidatorController@dashboard_recent_tile',
        'controller' => 'App\\Http\\Controllers\\ValidatorController@dashboard_recent_tile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/validator',
        'where' => 
        array (
        ),
        'as' => 'generated::rO68u2gx2QIFdj6B',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7yaSE5szENnXoz8n' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/validator/clientshortlistbyvalidator',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ValidatorController@client_short_list_by_validator',
        'controller' => 'App\\Http\\Controllers\\ValidatorController@client_short_list_by_validator',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/validator',
        'where' => 
        array (
        ),
        'as' => 'generated::7yaSE5szENnXoz8n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::xgYj0XgGfavGinpY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/checker/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckerController@register',
        'controller' => 'App\\Http\\Controllers\\CheckerController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/checker',
        'where' => 
        array (
        ),
        'as' => 'generated::xgYj0XgGfavGinpY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::8LRybR7IvT04BhR0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/checker/shortlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckerController@short_list',
        'controller' => 'App\\Http\\Controllers\\CheckerController@short_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/checker',
        'where' => 
        array (
        ),
        'as' => 'generated::8LRybR7IvT04BhR0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::WO8YH09E7rMPrjlQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/checker/clientlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckerController@client_list_by_checker',
        'controller' => 'App\\Http\\Controllers\\CheckerController@client_list_by_checker',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/checker',
        'where' => 
        array (
        ),
        'as' => 'generated::WO8YH09E7rMPrjlQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::y11cWs7KoiScofjc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/checker/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckerController@list',
        'controller' => 'App\\Http\\Controllers\\CheckerController@list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/checker',
        'where' => 
        array (
        ),
        'as' => 'generated::y11cWs7KoiScofjc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::muauWULe5uwE4y3e' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/checker/updatebyadmin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckerController@update_by_admin',
        'controller' => 'App\\Http\\Controllers\\CheckerController@update_by_admin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/checker',
        'where' => 
        array (
        ),
        'as' => 'generated::muauWULe5uwE4y3e',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::dZrGZX0HE7Uep6dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/checker/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckerController@update',
        'controller' => 'App\\Http\\Controllers\\CheckerController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/checker',
        'where' => 
        array (
        ),
        'as' => 'generated::dZrGZX0HE7Uep6dt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::768W9YIDCC1dS0DA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/checker/dashboardsummary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckerController@dashboard_summary',
        'controller' => 'App\\Http\\Controllers\\CheckerController@dashboard_summary',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/checker',
        'where' => 
        array (
        ),
        'as' => 'generated::768W9YIDCC1dS0DA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ITFsOseTN2NU52BK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/checker/dashboardrecenttile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckerController@dashboard_recent_tile',
        'controller' => 'App\\Http\\Controllers\\CheckerController@dashboard_recent_tile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/checker',
        'where' => 
        array (
        ),
        'as' => 'generated::ITFsOseTN2NU52BK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bHjCSlD90uhPlIji' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/checker/clientshortlistbychecker',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckerController@client_short_list_by_checker',
        'controller' => 'App\\Http\\Controllers\\CheckerController@client_short_list_by_checker',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/checker',
        'where' => 
        array (
        ),
        'as' => 'generated::bHjCSlD90uhPlIji',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qaSVy0JmEXt3KVcg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/client/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@register',
        'controller' => 'App\\Http\\Controllers\\ClientController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::qaSVy0JmEXt3KVcg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::o0CCzLaqId5iUJy2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/client/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@list',
        'controller' => 'App\\Http\\Controllers\\ClientController@list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::o0CCzLaqId5iUJy2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1Ep4UHEvmYGokIp9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/client/getclient',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@get_client',
        'controller' => 'App\\Http\\Controllers\\ClientController@get_client',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::1Ep4UHEvmYGokIp9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bBmcKSJ58jTRtYrT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/client/vatexpirydate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@vat_expiry_date',
        'controller' => 'App\\Http\\Controllers\\ClientController@vat_expiry_date',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::bBmcKSJ58jTRtYrT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fuWKpvxdv27diCxo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/client/addpaymentlink',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@add_payment_link',
        'controller' => 'App\\Http\\Controllers\\ClientController@add_payment_link',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::fuWKpvxdv27diCxo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::KvIlef8vA0UOi1Kp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/client/deletepaymentlink',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@delete_payment_link',
        'controller' => 'App\\Http\\Controllers\\ClientController@delete_payment_link',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::KvIlef8vA0UOi1Kp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Tg7i2e2FV8wd5QRH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/client/getpaymentlink',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@get_payment_link',
        'controller' => 'App\\Http\\Controllers\\ClientController@get_payment_link',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::Tg7i2e2FV8wd5QRH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::k8h0ATfGR0N8oxGZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/client/updatebyadmin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@update_by_admin',
        'controller' => 'App\\Http\\Controllers\\ClientController@update_by_admin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::k8h0ATfGR0N8oxGZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::IKhBluv9iqCl2Xe2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/client/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@update',
        'controller' => 'App\\Http\\Controllers\\ClientController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::IKhBluv9iqCl2Xe2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1IGHW3zirdsTAGBa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/client/dashboardsummary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@dashboard_summary',
        'controller' => 'App\\Http\\Controllers\\ClientController@dashboard_summary',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::1IGHW3zirdsTAGBa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::5KmxO4kXKuW6JiC4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/client/clientmonthwisegraph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@client_monthwise_graph',
        'controller' => 'App\\Http\\Controllers\\ClientController@client_monthwise_graph',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::5KmxO4kXKuW6JiC4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::OI8sdcJkhjNDywe4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/client/currentvatperiod',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ClientController@get_current_vat_period_date',
        'controller' => 'App\\Http\\Controllers\\ClientController@get_current_vat_period_date',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::OI8sdcJkhjNDywe4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GsRhgLtDGcCHMlPm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/client/sendemail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\MailController@index',
        'controller' => 'App\\Http\\Controllers\\MailController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/client',
        'where' => 
        array (
        ),
        'as' => 'generated::GsRhgLtDGcCHMlPm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BtkHl8V9LZzaPieR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/country/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CountryController@get',
        'controller' => 'App\\Http\\Controllers\\CountryController@get',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/country',
        'where' => 
        array (
        ),
        'as' => 'generated::BtkHl8V9LZzaPieR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::gC555hVzjdXM1CUy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/country/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CountryController@store',
        'controller' => 'App\\Http\\Controllers\\CountryController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/country',
        'where' => 
        array (
        ),
        'as' => 'generated::gC555hVzjdXM1CUy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::YWXfNpC8wu14XuVM' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/country/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CountryController@update',
        'controller' => 'App\\Http\\Controllers\\CountryController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/country',
        'where' => 
        array (
        ),
        'as' => 'generated::YWXfNpC8wu14XuVM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::oFkOB2APH03qTjbF' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/country/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\CountryController@destroy',
        'controller' => 'App\\Http\\Controllers\\CountryController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/country',
        'where' => 
        array (
        ),
        'as' => 'generated::oFkOB2APH03qTjbF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::lnUIVFkzU0Ae7P97' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/region/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\RegionController@get',
        'controller' => 'App\\Http\\Controllers\\RegionController@get',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/region',
        'where' => 
        array (
        ),
        'as' => 'generated::lnUIVFkzU0Ae7P97',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::tTEdQRPlKIVr4rqw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/region/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\RegionController@store',
        'controller' => 'App\\Http\\Controllers\\RegionController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/region',
        'where' => 
        array (
        ),
        'as' => 'generated::tTEdQRPlKIVr4rqw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Kbj1L8bKZY8Mm68k' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/region/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\RegionController@update',
        'controller' => 'App\\Http\\Controllers\\RegionController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/region',
        'where' => 
        array (
        ),
        'as' => 'generated::Kbj1L8bKZY8Mm68k',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Yib9DiW7lhpJIURg' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/region/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\RegionController@destroy',
        'controller' => 'App\\Http\\Controllers\\RegionController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/region',
        'where' => 
        array (
        ),
        'as' => 'generated::Yib9DiW7lhpJIURg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::RzKEctbCzl0zzQog' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/plan/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\PlanHistoryController@get',
        'controller' => 'App\\Http\\Controllers\\PlanHistoryController@get',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/plan',
        'where' => 
        array (
        ),
        'as' => 'generated::RzKEctbCzl0zzQog',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::NkVvF81v8ioygVW4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/plan/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\PlanHistoryController@create',
        'controller' => 'App\\Http\\Controllers\\PlanHistoryController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/plan',
        'where' => 
        array (
        ),
        'as' => 'generated::NkVvF81v8ioygVW4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VgY05qB28JwUeQTI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/supplier/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\SupplierController@list',
        'controller' => 'App\\Http\\Controllers\\SupplierController@list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/supplier',
        'where' => 
        array (
        ),
        'as' => 'generated::VgY05qB28JwUeQTI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4nahKrdumzrbqqPI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/supplier/topsixsupplierslist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\SupplierController@get_supplier_list',
        'controller' => 'App\\Http\\Controllers\\SupplierController@get_supplier_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/supplier',
        'where' => 
        array (
        ),
        'as' => 'generated::4nahKrdumzrbqqPI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::b5s1i7dxF4Hb5MLM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/supplier/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\SupplierController@create',
        'controller' => 'App\\Http\\Controllers\\SupplierController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/supplier',
        'where' => 
        array (
        ),
        'as' => 'generated::b5s1i7dxF4Hb5MLM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GMUbXrxapUH7NsBW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/supplier/shortlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\SupplierController@short_list',
        'controller' => 'App\\Http\\Controllers\\SupplierController@short_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/supplier',
        'where' => 
        array (
        ),
        'as' => 'generated::GMUbXrxapUH7NsBW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::gt9uuMyw7T8UPsfs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/supplier/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\SupplierController@update',
        'controller' => 'App\\Http\\Controllers\\SupplierController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/supplier',
        'where' => 
        array (
        ),
        'as' => 'generated::gt9uuMyw7T8UPsfs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::dSNE0w6EBoNdigQb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/supplier/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\SupplierController@get_supplier',
        'controller' => 'App\\Http\\Controllers\\SupplierController@get_supplier',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/supplier',
        'where' => 
        array (
        ),
        'as' => 'generated::dSNE0w6EBoNdigQb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3MJjmCdx0Q6O7A1M' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/entry/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@create',
        'controller' => 'App\\Http\\Controllers\\EntryController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::3MJjmCdx0Q6O7A1M',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::5C2091BjGl42en0s' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/clientpendinglist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@client_pending_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@client_pending_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::5C2091BjGl42en0s',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::lKnDgbC4P2U0C4xw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/checkerapprovedlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@checker_approved_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@checker_approved_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::lKnDgbC4P2U0C4xw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::0uKYlsuEnvO0F0ob' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/checkerpendinglist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@checker_pending_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@checker_pending_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::0uKYlsuEnvO0F0ob',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6LbaxAq5Pb2ipdNT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/checkerrejectedlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@checker_rejected_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@checker_rejected_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::6LbaxAq5Pb2ipdNT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GhBBhzvuM4TdiB0q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/validatorapprovedlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@validator_approved_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@validator_approved_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::GhBBhzvuM4TdiB0q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::znnBNFFJDEA6fsZb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/validatorpendinglist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@validator_pending_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@validator_pending_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::znnBNFFJDEA6fsZb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XCm2mxd90CFBhUzZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/validatorrejectedlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@validator_rejected_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@validator_rejected_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::XCm2mxd90CFBhUzZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::K4cACuiF02kYmBly' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/entry/setvalidatorstatus',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@set_validator_status',
        'controller' => 'App\\Http\\Controllers\\EntryController@set_validator_status',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::K4cACuiF02kYmBly',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::X3iTfcPGf3s0ANSf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/entry/setcheckerstatus',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@set_checker_status',
        'controller' => 'App\\Http\\Controllers\\EntryController@set_checker_status',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::X3iTfcPGf3s0ANSf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::0e3bpEZIqH7MxodP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/clientrecentlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@client_recent_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@client_recent_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::0e3bpEZIqH7MxodP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::u7AwjDOFJnjC8ZWB' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/entry/clientdeleteentry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@client_delete_entry',
        'controller' => 'App\\Http\\Controllers\\EntryController@client_delete_entry',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::u7AwjDOFJnjC8ZWB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::uftdLbElVHTlwC4F' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/entry/clientrequestfordelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@client_request_for_delete',
        'controller' => 'App\\Http\\Controllers\\EntryController@client_request_for_delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::uftdLbElVHTlwC4F',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Tz4TUeiF1apwGZVm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/entry/validatordeleteentry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@validator_delete_entry',
        'controller' => 'App\\Http\\Controllers\\EntryController@validator_delete_entry',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::Tz4TUeiF1apwGZVm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rzhkOfHJWcYrUYPe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/checkinvoicenumberexists',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@check_invoice_number_exists',
        'controller' => 'App\\Http\\Controllers\\EntryController@check_invoice_number_exists',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::rzhkOfHJWcYrUYPe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::JcNBvoCmMoYq1YpG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/checkercheckedlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@checker_checked_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@checker_checked_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::JcNBvoCmMoYq1YpG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::xSwMyC0ULqzdnPKh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/checkernoentrylist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@checker_no_entry_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@checker_no_entry_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::xSwMyC0ULqzdnPKh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zewGsNSg4GFkLCEK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/validatorcheckedlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@validator_checked_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@validator_checked_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::zewGsNSg4GFkLCEK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6WFvM0RMLLqew3r9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/clientdaywisesummary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@client_daywise_summary',
        'controller' => 'App\\Http\\Controllers\\EntryController@client_daywise_summary',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::6WFvM0RMLLqew3r9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::DzudbCAcHvZEObQA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/clientapprovedlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@client_approved_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@client_approved_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::DzudbCAcHvZEObQA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::KqSphjM0WGRxsBAS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/clientrejectedlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@client_rejected_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@client_rejected_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::KqSphjM0WGRxsBAS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::FSmdZ3OlpJd7SgK4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/admincheckerpendinglist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@admin_checker_pending_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@admin_checker_pending_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::FSmdZ3OlpJd7SgK4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::sGHOgEfQYOQgggEg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/admincheckerrejectedlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@admin_checker_rejected_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@admin_checker_rejected_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::sGHOgEfQYOQgggEg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::dJ7pMqRCYfjxsgIN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/adminvalidatorpendinglist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@admin_validator_pending_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@admin_validator_pending_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::dJ7pMqRCYfjxsgIN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::8GaMy40BvIzOzDI2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/admincheckedlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@admin_checked_list',
        'controller' => 'App\\Http\\Controllers\\EntryController@admin_checked_list',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::8GaMy40BvIzOzDI2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::HMOJPSG9xITGsysL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/invoiceexpgroups',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@get_invoice_exp_groups',
        'controller' => 'App\\Http\\Controllers\\EntryController@get_invoice_exp_groups',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::HMOJPSG9xITGsysL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ZUYl4rpwBfsBp2Dp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/invoicepurchasegroups',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@get_invoice_purchase_groups',
        'controller' => 'App\\Http\\Controllers\\EntryController@get_invoice_purchase_groups',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::ZUYl4rpwBfsBp2Dp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3HWpfZs0mFjUCrI7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/checkerlastweeksgraph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@checker_last_weeks_graph',
        'controller' => 'App\\Http\\Controllers\\EntryController@checker_last_weeks_graph',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::3HWpfZs0mFjUCrI7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Ma7cgqbO7nhphPpC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/validatorlastweeksgraph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@validator_last_weeks_graph',
        'controller' => 'App\\Http\\Controllers\\EntryController@validator_last_weeks_graph',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::Ma7cgqbO7nhphPpC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ZZGT3Gre4BAsFrIp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/clientmonthwisegraph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@client_monthwise_graph',
        'controller' => 'App\\Http\\Controllers\\EntryController@client_monthwise_graph',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::ZZGT3Gre4BAsFrIp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::YWUGhRMqOxpf5ssG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/adminlastweeksgraph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@admin_last_weeks_graph',
        'controller' => 'App\\Http\\Controllers\\EntryController@admin_last_weeks_graph',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::YWUGhRMqOxpf5ssG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7P8tItHaSzZqp9YJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/checkervatpayablegraph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@checker_vat_payable_graph',
        'controller' => 'App\\Http\\Controllers\\EntryController@checker_vat_payable_graph',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::7P8tItHaSzZqp9YJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::M3v0OtkWmzReAkMH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/validatorvatpayablegraph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@validator_vat_payable_graph',
        'controller' => 'App\\Http\\Controllers\\EntryController@validator_vat_payable_graph',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::M3v0OtkWmzReAkMH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wTjc1QioZs70PPRt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/entry/adminvatpayablegraph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EntryController@admin_vat_payable_graph',
        'controller' => 'App\\Http\\Controllers\\EntryController@admin_vat_payable_graph',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/entry',
        'where' => 
        array (
        ),
        'as' => 'generated::wTjc1QioZs70PPRt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GatXNaMYXeRNPE1L' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sale/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\SaleController@create',
        'controller' => 'App\\Http\\Controllers\\SaleController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/sale',
        'where' => 
        array (
        ),
        'as' => 'generated::GatXNaMYXeRNPE1L',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::s34vHeOvoHjMmdWp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sale/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\SaleController@get',
        'controller' => 'App\\Http\\Controllers\\SaleController@get',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/sale',
        'where' => 
        array (
        ),
        'as' => 'generated::s34vHeOvoHjMmdWp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::0cTgeANsVeaQTyn4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sale/clientsalesreport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\SaleController@client_sales_report',
        'controller' => 'App\\Http\\Controllers\\SaleController@client_sales_report',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/sale',
        'where' => 
        array (
        ),
        'as' => 'generated::0cTgeANsVeaQTyn4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::InXbjMK91zUNYtQc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/expenditure/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenditureController@create',
        'controller' => 'App\\Http\\Controllers\\ExpenditureController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/expenditure',
        'where' => 
        array (
        ),
        'as' => 'generated::InXbjMK91zUNYtQc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::OWNyQiE9KnglOWir' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/expenditure/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenditureController@get',
        'controller' => 'App\\Http\\Controllers\\ExpenditureController@get',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/expenditure',
        'where' => 
        array (
        ),
        'as' => 'generated::OWNyQiE9KnglOWir',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::LLRY6jKapGvlFxEd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/expenditure/clientexpenditurereport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenditureController@client_expenditure_report',
        'controller' => 'App\\Http\\Controllers\\ExpenditureController@client_expenditure_report',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/expenditure',
        'where' => 
        array (
        ),
        'as' => 'generated::LLRY6jKapGvlFxEd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::nzIdByJuCcGCp4dC' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/purchase/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\PurchaseController@create',
        'controller' => 'App\\Http\\Controllers\\PurchaseController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/purchase',
        'where' => 
        array (
        ),
        'as' => 'generated::nzIdByJuCcGCp4dC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::EJ9jsHigRqDP1BD2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/purchase/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\PurchaseController@get',
        'controller' => 'App\\Http\\Controllers\\PurchaseController@get',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/purchase',
        'where' => 
        array (
        ),
        'as' => 'generated::EJ9jsHigRqDP1BD2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ZlWcSOtltW4hZtYr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/purchase/clientpurchasesreport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\PurchaseController@client_purchases_report',
        'controller' => 'App\\Http\\Controllers\\PurchaseController@client_purchases_report',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/purchase',
        'where' => 
        array (
        ),
        'as' => 'generated::ZlWcSOtltW4hZtYr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::sR1U5i9FQm97YGtY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vatreport/vatreportperiodsforclient',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_periods_for_client',
        'controller' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_periods_for_client',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vatreport',
        'where' => 
        array (
        ),
        'as' => 'generated::sR1U5i9FQm97YGtY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::uhIYzb2RQEllxoJ2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/vatreport/vatreportperiodsforothers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_periods_for_others',
        'controller' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_periods_for_others',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vatreport',
        'where' => 
        array (
        ),
        'as' => 'generated::uhIYzb2RQEllxoJ2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wghrOTa3hWC3RWl0' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/vatreport/updatevatreportvalidator',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\VatReportController@update_vat_report_validator',
        'controller' => 'App\\Http\\Controllers\\VatReportController@update_vat_report_validator',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vatreport',
        'where' => 
        array (
        ),
        'as' => 'generated::wghrOTa3hWC3RWl0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::tXkUSIiB3XSToM3y' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vatreport/vatreportforvalidator',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_validator',
        'controller' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_validator',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vatreport',
        'where' => 
        array (
        ),
        'as' => 'generated::tXkUSIiB3XSToM3y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::lu0Tpy4PlwFJuUHW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vatreport/vatreportforvalidatorbyid',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_validator_by_id',
        'controller' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_validator_by_id',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vatreport',
        'where' => 
        array (
        ),
        'as' => 'generated::lu0Tpy4PlwFJuUHW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rPaiZb25nyEgMJFE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vatreport/vatreportforclient',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_for_client',
        'controller' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_for_client',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vatreport',
        'where' => 
        array (
        ),
        'as' => 'generated::rPaiZb25nyEgMJFE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::8bM3gQl728sJBqty' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vatreport/vatreportforothers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_for_others',
        'controller' => 'App\\Http\\Controllers\\VatReportController@get_vat_report_for_others',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vatreport',
        'where' => 
        array (
        ),
        'as' => 'generated::8bM3gQl728sJBqty',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::5Ui2lvMUv6pwGP3D' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vatreport/createvatreport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\VatReportController@create_vat_report',
        'controller' => 'App\\Http\\Controllers\\VatReportController@create_vat_report',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vatreport',
        'where' => 
        array (
        ),
        'as' => 'generated::5Ui2lvMUv6pwGP3D',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VZuR0EXlLI4zHpl8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vatreport/updatevatreport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\VatReportController@update_vat_report',
        'controller' => 'App\\Http\\Controllers\\VatReportController@update_vat_report',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vatreport',
        'where' => 
        array (
        ),
        'as' => 'generated::VZuR0EXlLI4zHpl8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::5kxFJrPSXg8gd6WA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/message/send',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\MessageController@send',
        'controller' => 'App\\Http\\Controllers\\MessageController@send',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/message',
        'where' => 
        array (
        ),
        'as' => 'generated::5kxFJrPSXg8gd6WA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4hwy41AOYqe5dfDT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/message/contacts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\MessageController@get_contacts',
        'controller' => 'App\\Http\\Controllers\\MessageController@get_contacts',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/message',
        'where' => 
        array (
        ),
        'as' => 'generated::4hwy41AOYqe5dfDT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qzBewxJk69W9Vpv8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/message/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\MessageController@get_messages',
        'controller' => 'App\\Http\\Controllers\\MessageController@get_messages',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/message',
        'where' => 
        array (
        ),
        'as' => 'generated::qzBewxJk69W9Vpv8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4HGRo8VZIBUwYz56' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/message/getallmessages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\MessageController@get_all_messages',
        'controller' => 'App\\Http\\Controllers\\MessageController@get_all_messages',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/message',
        'where' => 
        array (
        ),
        'as' => 'generated::4HGRo8VZIBUwYz56',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::pOB3Jb3QsFvhCQuz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":256:{@voa7PbjWOZ6jaNo5gIO6VoTeAAFlxWafDA/eaQJBMpc=.a:5:{s:3:"use";a:0:{}s:8:"function";s:44:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000002482193000000001012c757";}}',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::pOB3Jb3QsFvhCQuz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'verification.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/verify/{id}/{hash}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'signed',
        ),
        'uses' => 'App\\Http\\Controllers\\EmailVerificationController@verify',
        'controller' => 'App\\Http\\Controllers\\EmailVerificationController@verify',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'verification.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'verification.send' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/sendemailverification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\EmailVerificationController@send_verification_email',
        'controller' => 'App\\Http\\Controllers\\EmailVerificationController@send_verification_email',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'verification.send',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.sent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/forgotpassword',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ForgotPasswordController@forgot_password',
        'controller' => 'App\\Http\\Controllers\\ForgotPasswordController@forgot_password',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.sent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset-password/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":290:{@rQEW+KnNT5wfgGsVqrbkN9rpAGKZr/gnOhU/Zg582rA=.a:5:{s:3:"use";a:0:{}s:8:"function";s:78:"function ($token) {
    return \\view(\'password.reset\', [\'token\' => $token]);
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000248221e000000001012c757";}}',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ForgotPasswordController@reset_password',
        'controller' => 'App\\Http\\Controllers\\ForgotPasswordController@reset_password',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
  ),
)
);
