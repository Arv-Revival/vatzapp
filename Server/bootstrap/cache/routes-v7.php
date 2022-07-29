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
            '_route' => 'generated::OJKP21U9ptCvejF1',
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
            '_route' => 'generated::cX3NPmYbZGfMhB3N',
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
            '_route' => 'generated::z09t81za7XqdegGH',
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
            '_route' => 'generated::XrqL8fqvUZzDevX6',
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
            '_route' => 'generated::myyA3sutKGVA5xSz',
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
            '_route' => 'generated::Axsa8Qaika75G2tU',
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
            '_route' => 'generated::7qh7Cah1LBIoPLfS',
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
            '_route' => 'generated::BJbT1GppFIkmfMdS',
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
            '_route' => 'generated::jXCl75suxIdgwavS',
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
            '_route' => 'generated::qskeE4kkJFi7VKKe',
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
            '_route' => 'generated::SPsC5a1UmRiUhjmk',
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
            '_route' => 'generated::5YGNfF8OpNtVB6UU',
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
            '_route' => 'generated::3mhQEUpwNZoTsSpE',
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
            '_route' => 'generated::AQiQXpPGVx3mkVjJ',
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
            '_route' => 'generated::3jAWVIfe3yMnyqeC',
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
            '_route' => 'generated::kBBkc2a4rKPEv0ga',
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
            '_route' => 'generated::5siEXqP2z1k16RFg',
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
            '_route' => 'generated::08u9oBiY7aF8qupS',
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
            '_route' => 'generated::us3yygTpvdGNwzzW',
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
            '_route' => 'generated::1MVWOFxVGVlAwpy5',
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
            '_route' => 'generated::Yu94135AFXKcqFHh',
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
            '_route' => 'generated::44uPJxndbA5VCBmg',
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
            '_route' => 'generated::R6tEOA6ieZufwWCE',
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
            '_route' => 'generated::KRY33QlDHd5FP2M6',
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
            '_route' => 'generated::A6uZo9ZcGWxH0akv',
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
            '_route' => 'generated::mb3dLeshFXGA84KO',
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
            '_route' => 'generated::HLeRg2WYhKnHBe5h',
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
            '_route' => 'generated::VuIxdYRw2kxlNHgt',
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
            '_route' => 'generated::IeHgE6napBDey2cj',
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
            '_route' => 'generated::W9Lr2GEUwDWajs5N',
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
            '_route' => 'generated::IViioKE6Po4ZJJBC',
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
            '_route' => 'generated::LRGlvPWA3w4CwScr',
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
            '_route' => 'generated::1W561VXD3QgWkniS',
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
            '_route' => 'generated::iK5Cmxqlk5E4fzDH',
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
            '_route' => 'generated::MbTPpuwJQOBzGA9m',
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
            '_route' => 'generated::dDzplCpxGxl9XKS6',
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
            '_route' => 'generated::4iaWEOaiWYvRgLhj',
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
            '_route' => 'generated::yth9CGrcI50W1g3d',
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
            '_route' => 'generated::g3t9lwzdJVUIMYMx',
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
            '_route' => 'generated::VCUFY3X0M2nHTvwQ',
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
            '_route' => 'generated::FNvst0hEvXVVjEQo',
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
            '_route' => 'generated::jtfrc8BLlGVtnlEU',
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
            '_route' => 'generated::uzqmTVxolRMKuvc4',
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
            '_route' => 'generated::ouqgoSoEVG8tSioj',
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
            '_route' => 'generated::iERurAWrnoXFR2O5',
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
            '_route' => 'generated::TEub1mAAgB4v1eN4',
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
            '_route' => 'generated::PkTzotFUJQI6pt75',
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
            '_route' => 'generated::J5WH3CbxTbg5NLTP',
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
            '_route' => 'generated::42zxCXA98wMqUt3f',
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
            '_route' => 'generated::MCsXIJYhVTcnoLrB',
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
            '_route' => 'generated::84by2WEeo1ksM4oY',
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
            '_route' => 'generated::LsPyhWKCPtQMcLGo',
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
            '_route' => 'generated::q82wufdhyfGt3lvA',
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
            '_route' => 'generated::Xi6dWrYGXC91je5W',
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
            '_route' => 'generated::81e4bpfi5vcI8vt5',
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
            '_route' => 'generated::jtIrV5G0z3X5QdtJ',
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
            '_route' => 'generated::Lbv4FH7ZQ5cLQ13W',
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
            '_route' => 'generated::9fimKCDqFgfyvnbl',
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
            '_route' => 'generated::cwEuC9s2VzyXIULY',
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
            '_route' => 'generated::VY7537mvph3QNMMi',
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
            '_route' => 'generated::fHti1zkvy5PyOsCt',
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
            '_route' => 'generated::Nc3yxR7yRKYTCmVU',
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
            '_route' => 'generated::7n2xIM6c5eTXFY4D',
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
            '_route' => 'generated::jHnQvF3XCTXOIQtP',
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
            '_route' => 'generated::xBKlNu7b6NdR5qnR',
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
            '_route' => 'generated::IPTpQveRtDVXRhXN',
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
            '_route' => 'generated::aDo7hbhMGo1cSo9Y',
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
            '_route' => 'generated::qpxSLqiHAACBJ8kZ',
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
            '_route' => 'generated::zQ9uhvpV1uZzAdvX',
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
            '_route' => 'generated::aC0M4us9H5jJTbKi',
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
            '_route' => 'generated::sWBFm4lX1IVEbpG8',
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
            '_route' => 'generated::33G2bgcfTCC3kqhz',
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
            '_route' => 'generated::mHWQVpqhKxmhZFJT',
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
            '_route' => 'generated::V0BY3V0kIDIW0bwd',
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
            '_route' => 'generated::aqCZg1Ql7Io7ws4P',
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
            '_route' => 'generated::7ZplHdH7GD35tc8z',
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
            '_route' => 'generated::j8V04X39ZKR1CDvw',
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
            '_route' => 'generated::1iMuSwWeXDVxJhAC',
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
            '_route' => 'generated::wb3Ko0kLxb7kuZVA',
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
            '_route' => 'generated::UhzsV8orAPYBHw2m',
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
            '_route' => 'generated::edrWBYEwQ3nubMkF',
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
            '_route' => 'generated::0WS0vYKzyoqQ9lKk',
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
            '_route' => 'generated::8fGJzBkjcEmx4PnJ',
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
            '_route' => 'generated::sIXrXRm2H3xEJFwh',
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
            '_route' => 'generated::iglFithd599GeQ5q',
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
            '_route' => 'generated::zlPcaQZBXwUxFOIr',
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
            '_route' => 'generated::4PoJbrSz10fRi2tJ',
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
            '_route' => 'generated::9RQ62u9V2shq3QrY',
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
            '_route' => 'generated::Yzk5H67b6zbyA6eF',
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
            '_route' => 'generated::PtnGzZIOpiVwYYEd',
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
            '_route' => 'generated::cz7v2dSt3l7RtucW',
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
            '_route' => 'generated::hFhBN55LwtTCiazX',
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
            '_route' => 'generated::VIOhGOMhZNTt2msP',
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
            '_route' => 'generated::BgQEzOXRwA2INb82',
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
            '_route' => 'generated::Yivcel9Nr3w47Wc7',
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
            '_route' => 'generated::uEpyOxSr0EbvtQEv',
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
            '_route' => 'generated::nETPo9QBQBidit70',
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
            '_route' => 'generated::pyL6JBjAr8uFlPrv',
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
            '_route' => 'generated::mmNHJ3un1rujoWGR',
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
            '_route' => 'generated::vgGxdG5dI4IIzNDd',
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
            '_route' => 'generated::fgkA3Pm4Q8izz0bT',
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
            '_route' => 'generated::w9Yq0MJO11HgoV8G',
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
            '_route' => 'generated::RrKpxiWOpxwRVV0F',
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
            '_route' => 'generated::YZnLeODJ2T5IcvtJ',
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
            '_route' => 'generated::k9vhAXnEYzUG7Zd8',
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
            '_route' => 'generated::xKVhCkiFCBL6EQ9D',
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
            '_route' => 'generated::nQkfQC69NTQ9ygzy',
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
            '_route' => 'generated::5pWrpRYGAtwjZ9lQ',
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
            '_route' => 'generated::jhBfn1NvAbEomfC2',
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
            '_route' => 'generated::vGqDkBtXyyJcxnvU',
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
            '_route' => 'generated::WdPO70U9VTxxO7rh',
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
            '_route' => 'generated::yfSvFQSRbYuCJ1dq',
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
            '_route' => 'generated::9qmiezNpA9u92VmS',
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
            '_route' => 'generated::E52zJKo0MESdYyIB',
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
            '_route' => 'generated::azhnA6penoKxrQyy',
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
            '_route' => 'generated::xe61aPP5b3I3gC5U',
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
            '_route' => 'generated::YkRQHskSkgPXP7YF',
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
            '_route' => 'generated::QhRUKN0xdRAUuLdc',
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
            '_route' => 'generated::oBMU0I2SXPHkImKb',
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
            '_route' => 'generated::kh6aLaMseSbZdWhr',
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
            '_route' => 'generated::MO09D8VpzN6WaXc1',
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
            '_route' => 'generated::4qhQ7KmJZgI1kd5z',
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
            '_route' => 'generated::VrLL7R8Joo9WjpqU',
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
            '_route' => 'generated::dsXTkLXAU5nIlAq1',
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
            '_route' => 'generated::66EmCUH9t5mtMq4G',
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
            '_route' => 'generated::dCXKJt8saoWPYMwx',
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
            '_route' => 'generated::ZQ5shKJigRfpBkFf',
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
    'generated::OJKP21U9ptCvejF1' => 
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
        'as' => 'generated::OJKP21U9ptCvejF1',
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
    'generated::cX3NPmYbZGfMhB3N' => 
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
        'as' => 'generated::cX3NPmYbZGfMhB3N',
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
    'generated::z09t81za7XqdegGH' => 
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
        'as' => 'generated::z09t81za7XqdegGH',
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
    'generated::XrqL8fqvUZzDevX6' => 
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
        'as' => 'generated::XrqL8fqvUZzDevX6',
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
    'generated::myyA3sutKGVA5xSz' => 
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
        'as' => 'generated::myyA3sutKGVA5xSz',
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
    'generated::Axsa8Qaika75G2tU' => 
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
        'as' => 'generated::Axsa8Qaika75G2tU',
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
    'generated::7qh7Cah1LBIoPLfS' => 
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
        'as' => 'generated::7qh7Cah1LBIoPLfS',
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
    'generated::BJbT1GppFIkmfMdS' => 
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
        'as' => 'generated::BJbT1GppFIkmfMdS',
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
    'generated::jXCl75suxIdgwavS' => 
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
        'as' => 'generated::jXCl75suxIdgwavS',
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
    'generated::qskeE4kkJFi7VKKe' => 
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
        'as' => 'generated::qskeE4kkJFi7VKKe',
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
    'generated::SPsC5a1UmRiUhjmk' => 
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
        'as' => 'generated::SPsC5a1UmRiUhjmk',
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
    'generated::5YGNfF8OpNtVB6UU' => 
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
        'as' => 'generated::5YGNfF8OpNtVB6UU',
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
    'generated::3mhQEUpwNZoTsSpE' => 
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
        'as' => 'generated::3mhQEUpwNZoTsSpE',
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
    'generated::AQiQXpPGVx3mkVjJ' => 
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
        'as' => 'generated::AQiQXpPGVx3mkVjJ',
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
    'generated::3jAWVIfe3yMnyqeC' => 
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
        'as' => 'generated::3jAWVIfe3yMnyqeC',
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
    'generated::kBBkc2a4rKPEv0ga' => 
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
        'as' => 'generated::kBBkc2a4rKPEv0ga',
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
    'generated::5siEXqP2z1k16RFg' => 
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
        'as' => 'generated::5siEXqP2z1k16RFg',
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
    'generated::08u9oBiY7aF8qupS' => 
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
        'as' => 'generated::08u9oBiY7aF8qupS',
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
    'generated::us3yygTpvdGNwzzW' => 
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
        'as' => 'generated::us3yygTpvdGNwzzW',
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
    'generated::1MVWOFxVGVlAwpy5' => 
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
        'as' => 'generated::1MVWOFxVGVlAwpy5',
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
    'generated::Yu94135AFXKcqFHh' => 
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
        'as' => 'generated::Yu94135AFXKcqFHh',
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
    'generated::44uPJxndbA5VCBmg' => 
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
        'as' => 'generated::44uPJxndbA5VCBmg',
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
    'generated::R6tEOA6ieZufwWCE' => 
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
        'as' => 'generated::R6tEOA6ieZufwWCE',
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
    'generated::KRY33QlDHd5FP2M6' => 
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
        'as' => 'generated::KRY33QlDHd5FP2M6',
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
    'generated::A6uZo9ZcGWxH0akv' => 
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
        'as' => 'generated::A6uZo9ZcGWxH0akv',
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
    'generated::mb3dLeshFXGA84KO' => 
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
        'as' => 'generated::mb3dLeshFXGA84KO',
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
    'generated::HLeRg2WYhKnHBe5h' => 
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
        'as' => 'generated::HLeRg2WYhKnHBe5h',
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
    'generated::VuIxdYRw2kxlNHgt' => 
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
        'as' => 'generated::VuIxdYRw2kxlNHgt',
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
    'generated::IeHgE6napBDey2cj' => 
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
        'as' => 'generated::IeHgE6napBDey2cj',
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
    'generated::W9Lr2GEUwDWajs5N' => 
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
        'as' => 'generated::W9Lr2GEUwDWajs5N',
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
    'generated::IViioKE6Po4ZJJBC' => 
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
        'as' => 'generated::IViioKE6Po4ZJJBC',
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
    'generated::LRGlvPWA3w4CwScr' => 
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
        'as' => 'generated::LRGlvPWA3w4CwScr',
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
    'generated::1W561VXD3QgWkniS' => 
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
        'as' => 'generated::1W561VXD3QgWkniS',
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
    'generated::iK5Cmxqlk5E4fzDH' => 
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
        'as' => 'generated::iK5Cmxqlk5E4fzDH',
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
    'generated::MbTPpuwJQOBzGA9m' => 
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
        'as' => 'generated::MbTPpuwJQOBzGA9m',
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
    'generated::dDzplCpxGxl9XKS6' => 
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
        'as' => 'generated::dDzplCpxGxl9XKS6',
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
    'generated::4iaWEOaiWYvRgLhj' => 
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
        'as' => 'generated::4iaWEOaiWYvRgLhj',
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
    'generated::yth9CGrcI50W1g3d' => 
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
        'as' => 'generated::yth9CGrcI50W1g3d',
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
    'generated::g3t9lwzdJVUIMYMx' => 
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
        'as' => 'generated::g3t9lwzdJVUIMYMx',
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
    'generated::VCUFY3X0M2nHTvwQ' => 
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
        'as' => 'generated::VCUFY3X0M2nHTvwQ',
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
    'generated::FNvst0hEvXVVjEQo' => 
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
        'as' => 'generated::FNvst0hEvXVVjEQo',
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
    'generated::jtfrc8BLlGVtnlEU' => 
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
        'as' => 'generated::jtfrc8BLlGVtnlEU',
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
    'generated::uzqmTVxolRMKuvc4' => 
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
        'as' => 'generated::uzqmTVxolRMKuvc4',
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
    'generated::ouqgoSoEVG8tSioj' => 
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
        'as' => 'generated::ouqgoSoEVG8tSioj',
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
    'generated::iERurAWrnoXFR2O5' => 
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
        'as' => 'generated::iERurAWrnoXFR2O5',
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
    'generated::TEub1mAAgB4v1eN4' => 
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
        'as' => 'generated::TEub1mAAgB4v1eN4',
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
    'generated::PkTzotFUJQI6pt75' => 
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
        'as' => 'generated::PkTzotFUJQI6pt75',
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
    'generated::J5WH3CbxTbg5NLTP' => 
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
        'as' => 'generated::J5WH3CbxTbg5NLTP',
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
    'generated::42zxCXA98wMqUt3f' => 
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
        'as' => 'generated::42zxCXA98wMqUt3f',
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
    'generated::MCsXIJYhVTcnoLrB' => 
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
        'as' => 'generated::MCsXIJYhVTcnoLrB',
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
    'generated::84by2WEeo1ksM4oY' => 
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
        'as' => 'generated::84by2WEeo1ksM4oY',
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
    'generated::LsPyhWKCPtQMcLGo' => 
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
        'as' => 'generated::LsPyhWKCPtQMcLGo',
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
    'generated::q82wufdhyfGt3lvA' => 
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
        'as' => 'generated::q82wufdhyfGt3lvA',
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
    'generated::Xi6dWrYGXC91je5W' => 
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
        'as' => 'generated::Xi6dWrYGXC91je5W',
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
    'generated::81e4bpfi5vcI8vt5' => 
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
        'as' => 'generated::81e4bpfi5vcI8vt5',
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
    'generated::jtIrV5G0z3X5QdtJ' => 
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
        'as' => 'generated::jtIrV5G0z3X5QdtJ',
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
    'generated::Lbv4FH7ZQ5cLQ13W' => 
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
        'as' => 'generated::Lbv4FH7ZQ5cLQ13W',
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
    'generated::9fimKCDqFgfyvnbl' => 
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
        'as' => 'generated::9fimKCDqFgfyvnbl',
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
    'generated::cwEuC9s2VzyXIULY' => 
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
        'as' => 'generated::cwEuC9s2VzyXIULY',
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
    'generated::VY7537mvph3QNMMi' => 
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
        'as' => 'generated::VY7537mvph3QNMMi',
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
    'generated::fHti1zkvy5PyOsCt' => 
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
        'as' => 'generated::fHti1zkvy5PyOsCt',
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
    'generated::Nc3yxR7yRKYTCmVU' => 
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
        'as' => 'generated::Nc3yxR7yRKYTCmVU',
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
    'generated::7n2xIM6c5eTXFY4D' => 
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
        'as' => 'generated::7n2xIM6c5eTXFY4D',
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
    'generated::jHnQvF3XCTXOIQtP' => 
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
        'as' => 'generated::jHnQvF3XCTXOIQtP',
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
    'generated::xBKlNu7b6NdR5qnR' => 
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
        'as' => 'generated::xBKlNu7b6NdR5qnR',
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
    'generated::IPTpQveRtDVXRhXN' => 
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
        'as' => 'generated::IPTpQveRtDVXRhXN',
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
    'generated::aDo7hbhMGo1cSo9Y' => 
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
        'as' => 'generated::aDo7hbhMGo1cSo9Y',
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
    'generated::qpxSLqiHAACBJ8kZ' => 
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
        'as' => 'generated::qpxSLqiHAACBJ8kZ',
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
    'generated::zQ9uhvpV1uZzAdvX' => 
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
        'as' => 'generated::zQ9uhvpV1uZzAdvX',
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
    'generated::aC0M4us9H5jJTbKi' => 
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
        'as' => 'generated::aC0M4us9H5jJTbKi',
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
    'generated::sWBFm4lX1IVEbpG8' => 
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
        'as' => 'generated::sWBFm4lX1IVEbpG8',
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
    'generated::33G2bgcfTCC3kqhz' => 
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
        'as' => 'generated::33G2bgcfTCC3kqhz',
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
    'generated::mHWQVpqhKxmhZFJT' => 
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
        'as' => 'generated::mHWQVpqhKxmhZFJT',
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
    'generated::V0BY3V0kIDIW0bwd' => 
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
        'as' => 'generated::V0BY3V0kIDIW0bwd',
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
    'generated::aqCZg1Ql7Io7ws4P' => 
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
        'as' => 'generated::aqCZg1Ql7Io7ws4P',
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
    'generated::7ZplHdH7GD35tc8z' => 
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
        'as' => 'generated::7ZplHdH7GD35tc8z',
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
    'generated::j8V04X39ZKR1CDvw' => 
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
        'as' => 'generated::j8V04X39ZKR1CDvw',
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
    'generated::1iMuSwWeXDVxJhAC' => 
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
        'as' => 'generated::1iMuSwWeXDVxJhAC',
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
    'generated::wb3Ko0kLxb7kuZVA' => 
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
        'as' => 'generated::wb3Ko0kLxb7kuZVA',
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
    'generated::UhzsV8orAPYBHw2m' => 
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
        'as' => 'generated::UhzsV8orAPYBHw2m',
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
    'generated::edrWBYEwQ3nubMkF' => 
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
        'as' => 'generated::edrWBYEwQ3nubMkF',
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
    'generated::0WS0vYKzyoqQ9lKk' => 
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
        'as' => 'generated::0WS0vYKzyoqQ9lKk',
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
    'generated::8fGJzBkjcEmx4PnJ' => 
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
        'as' => 'generated::8fGJzBkjcEmx4PnJ',
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
    'generated::sIXrXRm2H3xEJFwh' => 
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
        'as' => 'generated::sIXrXRm2H3xEJFwh',
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
    'generated::iglFithd599GeQ5q' => 
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
        'as' => 'generated::iglFithd599GeQ5q',
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
    'generated::zlPcaQZBXwUxFOIr' => 
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
        'as' => 'generated::zlPcaQZBXwUxFOIr',
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
    'generated::4PoJbrSz10fRi2tJ' => 
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
        'as' => 'generated::4PoJbrSz10fRi2tJ',
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
    'generated::9RQ62u9V2shq3QrY' => 
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
        'as' => 'generated::9RQ62u9V2shq3QrY',
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
    'generated::Yzk5H67b6zbyA6eF' => 
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
        'as' => 'generated::Yzk5H67b6zbyA6eF',
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
    'generated::PtnGzZIOpiVwYYEd' => 
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
        'as' => 'generated::PtnGzZIOpiVwYYEd',
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
    'generated::cz7v2dSt3l7RtucW' => 
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
        'as' => 'generated::cz7v2dSt3l7RtucW',
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
    'generated::hFhBN55LwtTCiazX' => 
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
        'as' => 'generated::hFhBN55LwtTCiazX',
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
    'generated::VIOhGOMhZNTt2msP' => 
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
        'as' => 'generated::VIOhGOMhZNTt2msP',
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
    'generated::BgQEzOXRwA2INb82' => 
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
        'as' => 'generated::BgQEzOXRwA2INb82',
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
    'generated::Yivcel9Nr3w47Wc7' => 
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
        'as' => 'generated::Yivcel9Nr3w47Wc7',
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
    'generated::uEpyOxSr0EbvtQEv' => 
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
        'as' => 'generated::uEpyOxSr0EbvtQEv',
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
    'generated::nETPo9QBQBidit70' => 
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
        'as' => 'generated::nETPo9QBQBidit70',
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
    'generated::pyL6JBjAr8uFlPrv' => 
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
        'as' => 'generated::pyL6JBjAr8uFlPrv',
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
    'generated::mmNHJ3un1rujoWGR' => 
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
        'as' => 'generated::mmNHJ3un1rujoWGR',
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
    'generated::vgGxdG5dI4IIzNDd' => 
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
        'as' => 'generated::vgGxdG5dI4IIzNDd',
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
    'generated::fgkA3Pm4Q8izz0bT' => 
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
        'as' => 'generated::fgkA3Pm4Q8izz0bT',
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
    'generated::w9Yq0MJO11HgoV8G' => 
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
        'as' => 'generated::w9Yq0MJO11HgoV8G',
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
    'generated::RrKpxiWOpxwRVV0F' => 
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
        'as' => 'generated::RrKpxiWOpxwRVV0F',
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
    'generated::YZnLeODJ2T5IcvtJ' => 
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
        'as' => 'generated::YZnLeODJ2T5IcvtJ',
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
    'generated::k9vhAXnEYzUG7Zd8' => 
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
        'as' => 'generated::k9vhAXnEYzUG7Zd8',
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
    'generated::xKVhCkiFCBL6EQ9D' => 
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
        'as' => 'generated::xKVhCkiFCBL6EQ9D',
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
    'generated::nQkfQC69NTQ9ygzy' => 
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
        'as' => 'generated::nQkfQC69NTQ9ygzy',
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
    'generated::5pWrpRYGAtwjZ9lQ' => 
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
        'as' => 'generated::5pWrpRYGAtwjZ9lQ',
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
    'generated::jhBfn1NvAbEomfC2' => 
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
        'as' => 'generated::jhBfn1NvAbEomfC2',
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
    'generated::vGqDkBtXyyJcxnvU' => 
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
        'as' => 'generated::vGqDkBtXyyJcxnvU',
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
    'generated::WdPO70U9VTxxO7rh' => 
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
        'as' => 'generated::WdPO70U9VTxxO7rh',
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
    'generated::yfSvFQSRbYuCJ1dq' => 
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
        'as' => 'generated::yfSvFQSRbYuCJ1dq',
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
    'generated::9qmiezNpA9u92VmS' => 
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
        'as' => 'generated::9qmiezNpA9u92VmS',
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
    'generated::E52zJKo0MESdYyIB' => 
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
        'as' => 'generated::E52zJKo0MESdYyIB',
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
    'generated::azhnA6penoKxrQyy' => 
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
        'as' => 'generated::azhnA6penoKxrQyy',
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
    'generated::xe61aPP5b3I3gC5U' => 
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
        'as' => 'generated::xe61aPP5b3I3gC5U',
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
    'generated::YkRQHskSkgPXP7YF' => 
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
        'as' => 'generated::YkRQHskSkgPXP7YF',
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
    'generated::QhRUKN0xdRAUuLdc' => 
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
        'as' => 'generated::QhRUKN0xdRAUuLdc',
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
    'generated::oBMU0I2SXPHkImKb' => 
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
        'as' => 'generated::oBMU0I2SXPHkImKb',
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
    'generated::kh6aLaMseSbZdWhr' => 
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
        'as' => 'generated::kh6aLaMseSbZdWhr',
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
    'generated::MO09D8VpzN6WaXc1' => 
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
        'as' => 'generated::MO09D8VpzN6WaXc1',
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
    'generated::4qhQ7KmJZgI1kd5z' => 
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
        'as' => 'generated::4qhQ7KmJZgI1kd5z',
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
    'generated::VrLL7R8Joo9WjpqU' => 
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
        'as' => 'generated::VrLL7R8Joo9WjpqU',
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
    'generated::dsXTkLXAU5nIlAq1' => 
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
        'as' => 'generated::dsXTkLXAU5nIlAq1',
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
    'generated::66EmCUH9t5mtMq4G' => 
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
        'as' => 'generated::66EmCUH9t5mtMq4G',
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
    'generated::dCXKJt8saoWPYMwx' => 
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
        'as' => 'generated::dCXKJt8saoWPYMwx',
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
    'generated::ZQ5shKJigRfpBkFf' => 
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":256:{@yusy6j5I0oLIPcaM/0XYS4F3OUg2nkiOZVSlT9g27D8=.a:5:{s:3:"use";a:0:{}s:8:"function";s:44:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000006ed0ddea000000004847c462";}}',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::ZQ5shKJigRfpBkFf',
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":290:{@koim+rUhCxQW9IzwTDydzErB7jbG78BbQr190tmwORI=.a:5:{s:3:"use";a:0:{}s:8:"function";s:78:"function ($token) {
    return \\view(\'password.reset\', [\'token\' => $token]);
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000006ed0de67000000004847c462";}}',
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
