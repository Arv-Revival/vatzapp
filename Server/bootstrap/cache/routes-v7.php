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
            '_route' => 'generated::a5iKeXXEfaJwWzzm',
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
            '_route' => 'generated::xJhVL8AcpeqP8b7A',
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
            '_route' => 'generated::16L2PorMEShxOreF',
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
            '_route' => 'generated::Ws8jIkqJP1h8NI6B',
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
            '_route' => 'generated::und8It8mSmay4WtB',
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
            '_route' => 'generated::TRvfyD3Nxe0WXDgw',
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
            '_route' => 'generated::8R76TEGuvUvBXexh',
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
            '_route' => 'generated::6iHONdteoEd5uKdy',
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
            '_route' => 'generated::7rGcRkIHtJC2WPow',
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
            '_route' => 'generated::V8hlSvQtwjxqCGzj',
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
            '_route' => 'generated::dg2FZkIMI5RLaniz',
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
            '_route' => 'generated::4zSLb9n8HoSVmJId',
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
            '_route' => 'generated::rZeeXRcPXmOsNbP3',
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
            '_route' => 'generated::R195viqZMnev3llE',
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
            '_route' => 'generated::Q4wBf8Y1xEXxRTWD',
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
            '_route' => 'generated::Rx7D5n0XzQ1nnMFL',
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
            '_route' => 'generated::ArtNqWJA3DtRWLp0',
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
            '_route' => 'generated::edqJ3qhTFwhCUtN7',
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
            '_route' => 'generated::raCFBCsZf8JpAL0C',
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
            '_route' => 'generated::5h1d9DgRWpH212kd',
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
            '_route' => 'generated::j9jjx3djFe2VFd6R',
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
            '_route' => 'generated::KXGgXlh0fYvEwfFp',
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
            '_route' => 'generated::LjbKGlSJnsw02kSp',
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
            '_route' => 'generated::vLb03InjaxiXIsWG',
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
            '_route' => 'generated::dpEG6ewsC4OthpUE',
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
            '_route' => 'generated::cvWT29vglKNZ373s',
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
            '_route' => 'generated::wT24cwRZ5QIP4HvA',
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
            '_route' => 'generated::oYbGZkWe7GOu7JLC',
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
            '_route' => 'generated::Fv04stu7DUAMtrw6',
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
            '_route' => 'generated::aIlxNOi0BspHc3DJ',
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
            '_route' => 'generated::d5eyGpIUZbjGW6Gd',
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
            '_route' => 'generated::WNPizKFAkjGITQLD',
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
            '_route' => 'generated::STnMfQ1rtgWysvET',
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
            '_route' => 'generated::O3qXYUaUzlUqaS0C',
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
            '_route' => 'generated::Kpn9a2Nf8gD05DY9',
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
            '_route' => 'generated::VKPB7Lw0Z9zregqv',
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
            '_route' => 'generated::1u1aI8UvAop2nbrv',
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
            '_route' => 'generated::fbUhGNzL2oNzahg8',
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
            '_route' => 'generated::8ad06wgw0Gx38OLo',
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
            '_route' => 'generated::oiT8BOHfrzeHeFtZ',
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
            '_route' => 'generated::2J5f3KaFaX4Z2N4D',
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
            '_route' => 'generated::pZvunoFIULbi3sdx',
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
            '_route' => 'generated::a8vBHyTi1qLU4y7K',
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
            '_route' => 'generated::UursV3vprIY1azR6',
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
            '_route' => 'generated::B8kguUN2BBrlJ692',
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
            '_route' => 'generated::wMbDy057hhHcyfYp',
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
            '_route' => 'generated::n30llJxdurYN62ap',
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
            '_route' => 'generated::59aL0xO8yLpaRIyL',
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
            '_route' => 'generated::am17Aa0b2OqbiN3B',
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
            '_route' => 'generated::8GAHLdfDPqsBMRvj',
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
            '_route' => 'generated::XuYzsRL8fZdqNgbj',
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
            '_route' => 'generated::B9GI5PLQEOcAxn50',
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
            '_route' => 'generated::A9enAlZH5Q8NaPZz',
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
            '_route' => 'generated::0FLiSl2HD2K43FtT',
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
            '_route' => 'generated::erJobHamxT4A1Jf6',
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
            '_route' => 'generated::YbrLOyX9C6c5x5eg',
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
            '_route' => 'generated::vtD9aIsiZuqNMSpg',
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
            '_route' => 'generated::Qjz3eJLSYMWpL2vQ',
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
            '_route' => 'generated::WybkHbhVnMJN382u',
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
            '_route' => 'generated::jjbUF8dCH6B5KEXd',
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
            '_route' => 'generated::QM1HDIOOk9SRfqLp',
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
            '_route' => 'generated::SD81jtRW3lelTmXh',
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
            '_route' => 'generated::MBiUaZ5iuOknW1Ji',
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
            '_route' => 'generated::DznmTnP50bCj1gqd',
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
            '_route' => 'generated::lbHUmu6NEFBr1dio',
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
            '_route' => 'generated::50oOopG7JozjFhfL',
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
            '_route' => 'generated::7zsbcbINE8cce0uc',
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
            '_route' => 'generated::GUUKub4BGK5C8Tmc',
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
            '_route' => 'generated::fZFaH106KBWWEz3H',
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
            '_route' => 'generated::TYRJabO7MTQliD7J',
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
            '_route' => 'generated::ruhcQAh0JtrOTAs7',
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
            '_route' => 'generated::k8k616AxNIulkNdT',
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
            '_route' => 'generated::Cvo51RuYudixWeDg',
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
            '_route' => 'generated::ZpqjjDYuj4ZAnQWo',
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
            '_route' => 'generated::Yg5TVqwCIKfEMbfN',
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
            '_route' => 'generated::D3OlEpsH9aFLuM14',
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
            '_route' => 'generated::czgnQKPJB3QANqPf',
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
            '_route' => 'generated::Se7x3IoFseC4b8XQ',
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
            '_route' => 'generated::l91JL4IKFnNxrwBl',
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
            '_route' => 'generated::zUUmvgNw7k4wWh7X',
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
            '_route' => 'generated::fuLgrJDD5wRmI8hj',
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
            '_route' => 'generated::LojfIIIo4yG65CBr',
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
            '_route' => 'generated::q8ToJpE8w5RenG2w',
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
            '_route' => 'generated::Zd0irxwn7dVzVAwM',
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
            '_route' => 'generated::1ZwN8q0ptAs8Gbcx',
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
            '_route' => 'generated::jS1Z5VAoIPlTkgno',
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
            '_route' => 'generated::FgORbVCROJwRzNkC',
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
            '_route' => 'generated::DciihWRuRdbP1Xmi',
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
            '_route' => 'generated::3x26gdLMp3kdqdNT',
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
            '_route' => 'generated::ICqX8yzmicjnGMZX',
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
            '_route' => 'generated::UBNvDRNQrFB4Emq2',
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
            '_route' => 'generated::I6yQtCbE72afxMGe',
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
            '_route' => 'generated::jW8aleygf53R0Gh6',
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
            '_route' => 'generated::YW7abpkbj4TicINI',
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
            '_route' => 'generated::Re0OLFalwUVjbfGU',
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
            '_route' => 'generated::cL8UdW3yUZc6HgtS',
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
            '_route' => 'generated::JzMvqYMolYBxvaZa',
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
            '_route' => 'generated::VfIuOFjT3OT08TpX',
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
            '_route' => 'generated::rZAee1Kx7VGtmQWH',
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
            '_route' => 'generated::J8KyMsKhfavU5TUe',
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
            '_route' => 'generated::UbOIpoY21u8yjbi6',
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
            '_route' => 'generated::2ZRNhqk5D4K6lhil',
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
            '_route' => 'generated::Two0Jq4i6aKVI9y8',
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
            '_route' => 'generated::PZc99g18GUmNxg80',
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
            '_route' => 'generated::5qaiZjmZBQV33d3B',
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
            '_route' => 'generated::9y4XiuWY9LAN0R9V',
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
            '_route' => 'generated::EywB9f7ML3wXam1x',
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
            '_route' => 'generated::Y91M1bRkk63llzPx',
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
            '_route' => 'generated::lu3IVKcc7Up2U0nC',
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
            '_route' => 'generated::hFVZFONesaZeKTpD',
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
            '_route' => 'generated::6fMUu8SbBEQtB6oC',
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
            '_route' => 'generated::3NPzxm54DSQpRqPt',
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
            '_route' => 'generated::0oc6KVbJz7rsQFQN',
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
            '_route' => 'generated::iVjlGSciSxdVz05n',
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
            '_route' => 'generated::T0VOMdX24CPbzld7',
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
            '_route' => 'generated::XZ2Kg7wCYY5VHQMx',
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
            '_route' => 'generated::ibYGqEm0eiCHP8vu',
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
            '_route' => 'generated::3PIvOmOPsT6yX7GV',
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
            '_route' => 'generated::Iarm0Qn2JDyo4KyB',
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
            '_route' => 'generated::PwiUNd8gls7cpCPn',
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
            '_route' => 'generated::Nmuficd2LHFYvc2b',
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
            '_route' => 'generated::8JhvDJxckQA7w0aE',
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
            '_route' => 'generated::nnCyIXFQzZXXjE2J',
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
            '_route' => 'generated::ZDEIiVSFQni2BReH',
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
            '_route' => 'generated::wzjXHQ2MCaUZGYBI',
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
            '_route' => 'generated::7nMSB0PRywrf64Wz',
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
            '_route' => 'generated::LG57eFGVYVJZ0cE3',
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
    'generated::a5iKeXXEfaJwWzzm' => 
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
        'as' => 'generated::a5iKeXXEfaJwWzzm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::xJhVL8AcpeqP8b7A' => 
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
        'as' => 'generated::xJhVL8AcpeqP8b7A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::16L2PorMEShxOreF' => 
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
        'as' => 'generated::16L2PorMEShxOreF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Ws8jIkqJP1h8NI6B' => 
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
        'as' => 'generated::Ws8jIkqJP1h8NI6B',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::und8It8mSmay4WtB' => 
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
        'as' => 'generated::und8It8mSmay4WtB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::TRvfyD3Nxe0WXDgw' => 
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
        'as' => 'generated::TRvfyD3Nxe0WXDgw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::8R76TEGuvUvBXexh' => 
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
        'as' => 'generated::8R76TEGuvUvBXexh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6iHONdteoEd5uKdy' => 
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
        'as' => 'generated::6iHONdteoEd5uKdy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7rGcRkIHtJC2WPow' => 
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
        'as' => 'generated::7rGcRkIHtJC2WPow',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::V8hlSvQtwjxqCGzj' => 
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
        'as' => 'generated::V8hlSvQtwjxqCGzj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::dg2FZkIMI5RLaniz' => 
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
        'as' => 'generated::dg2FZkIMI5RLaniz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4zSLb9n8HoSVmJId' => 
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
        'as' => 'generated::4zSLb9n8HoSVmJId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rZeeXRcPXmOsNbP3' => 
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
        'as' => 'generated::rZeeXRcPXmOsNbP3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::R195viqZMnev3llE' => 
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
        'as' => 'generated::R195viqZMnev3llE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Q4wBf8Y1xEXxRTWD' => 
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
        'as' => 'generated::Q4wBf8Y1xEXxRTWD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Rx7D5n0XzQ1nnMFL' => 
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
        'as' => 'generated::Rx7D5n0XzQ1nnMFL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ArtNqWJA3DtRWLp0' => 
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
        'as' => 'generated::ArtNqWJA3DtRWLp0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::edqJ3qhTFwhCUtN7' => 
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
        'as' => 'generated::edqJ3qhTFwhCUtN7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::raCFBCsZf8JpAL0C' => 
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
        'as' => 'generated::raCFBCsZf8JpAL0C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::5h1d9DgRWpH212kd' => 
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
        'as' => 'generated::5h1d9DgRWpH212kd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::j9jjx3djFe2VFd6R' => 
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
        'as' => 'generated::j9jjx3djFe2VFd6R',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::KXGgXlh0fYvEwfFp' => 
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
        'as' => 'generated::KXGgXlh0fYvEwfFp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::LjbKGlSJnsw02kSp' => 
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
        'as' => 'generated::LjbKGlSJnsw02kSp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::vLb03InjaxiXIsWG' => 
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
        'as' => 'generated::vLb03InjaxiXIsWG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::dpEG6ewsC4OthpUE' => 
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
        'as' => 'generated::dpEG6ewsC4OthpUE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::cvWT29vglKNZ373s' => 
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
        'as' => 'generated::cvWT29vglKNZ373s',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wT24cwRZ5QIP4HvA' => 
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
        'as' => 'generated::wT24cwRZ5QIP4HvA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::oYbGZkWe7GOu7JLC' => 
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
        'as' => 'generated::oYbGZkWe7GOu7JLC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Fv04stu7DUAMtrw6' => 
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
        'as' => 'generated::Fv04stu7DUAMtrw6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::aIlxNOi0BspHc3DJ' => 
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
        'as' => 'generated::aIlxNOi0BspHc3DJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::d5eyGpIUZbjGW6Gd' => 
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
        'as' => 'generated::d5eyGpIUZbjGW6Gd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::WNPizKFAkjGITQLD' => 
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
        'as' => 'generated::WNPizKFAkjGITQLD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::STnMfQ1rtgWysvET' => 
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
        'as' => 'generated::STnMfQ1rtgWysvET',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::O3qXYUaUzlUqaS0C' => 
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
        'as' => 'generated::O3qXYUaUzlUqaS0C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Kpn9a2Nf8gD05DY9' => 
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
        'as' => 'generated::Kpn9a2Nf8gD05DY9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VKPB7Lw0Z9zregqv' => 
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
        'as' => 'generated::VKPB7Lw0Z9zregqv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1u1aI8UvAop2nbrv' => 
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
        'as' => 'generated::1u1aI8UvAop2nbrv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fbUhGNzL2oNzahg8' => 
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
        'as' => 'generated::fbUhGNzL2oNzahg8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::8ad06wgw0Gx38OLo' => 
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
        'as' => 'generated::8ad06wgw0Gx38OLo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::oiT8BOHfrzeHeFtZ' => 
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
        'as' => 'generated::oiT8BOHfrzeHeFtZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::2J5f3KaFaX4Z2N4D' => 
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
        'as' => 'generated::2J5f3KaFaX4Z2N4D',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::pZvunoFIULbi3sdx' => 
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
        'as' => 'generated::pZvunoFIULbi3sdx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::a8vBHyTi1qLU4y7K' => 
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
        'as' => 'generated::a8vBHyTi1qLU4y7K',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::UursV3vprIY1azR6' => 
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
        'as' => 'generated::UursV3vprIY1azR6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::B8kguUN2BBrlJ692' => 
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
        'as' => 'generated::B8kguUN2BBrlJ692',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wMbDy057hhHcyfYp' => 
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
        'as' => 'generated::wMbDy057hhHcyfYp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::n30llJxdurYN62ap' => 
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
        'as' => 'generated::n30llJxdurYN62ap',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::59aL0xO8yLpaRIyL' => 
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
        'as' => 'generated::59aL0xO8yLpaRIyL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::am17Aa0b2OqbiN3B' => 
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
        'as' => 'generated::am17Aa0b2OqbiN3B',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::8GAHLdfDPqsBMRvj' => 
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
        'as' => 'generated::8GAHLdfDPqsBMRvj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XuYzsRL8fZdqNgbj' => 
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
        'as' => 'generated::XuYzsRL8fZdqNgbj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::B9GI5PLQEOcAxn50' => 
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
        'as' => 'generated::B9GI5PLQEOcAxn50',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::A9enAlZH5Q8NaPZz' => 
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
        'as' => 'generated::A9enAlZH5Q8NaPZz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::0FLiSl2HD2K43FtT' => 
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
        'as' => 'generated::0FLiSl2HD2K43FtT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::erJobHamxT4A1Jf6' => 
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
        'as' => 'generated::erJobHamxT4A1Jf6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::YbrLOyX9C6c5x5eg' => 
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
        'as' => 'generated::YbrLOyX9C6c5x5eg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::vtD9aIsiZuqNMSpg' => 
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
        'as' => 'generated::vtD9aIsiZuqNMSpg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Qjz3eJLSYMWpL2vQ' => 
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
        'as' => 'generated::Qjz3eJLSYMWpL2vQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::WybkHbhVnMJN382u' => 
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
        'as' => 'generated::WybkHbhVnMJN382u',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::jjbUF8dCH6B5KEXd' => 
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
        'as' => 'generated::jjbUF8dCH6B5KEXd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::QM1HDIOOk9SRfqLp' => 
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
        'as' => 'generated::QM1HDIOOk9SRfqLp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::SD81jtRW3lelTmXh' => 
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
        'as' => 'generated::SD81jtRW3lelTmXh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::MBiUaZ5iuOknW1Ji' => 
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
        'as' => 'generated::MBiUaZ5iuOknW1Ji',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::DznmTnP50bCj1gqd' => 
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
        'as' => 'generated::DznmTnP50bCj1gqd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::lbHUmu6NEFBr1dio' => 
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
        'as' => 'generated::lbHUmu6NEFBr1dio',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::50oOopG7JozjFhfL' => 
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
        'as' => 'generated::50oOopG7JozjFhfL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7zsbcbINE8cce0uc' => 
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
        'as' => 'generated::7zsbcbINE8cce0uc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GUUKub4BGK5C8Tmc' => 
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
        'as' => 'generated::GUUKub4BGK5C8Tmc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fZFaH106KBWWEz3H' => 
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
        'as' => 'generated::fZFaH106KBWWEz3H',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::TYRJabO7MTQliD7J' => 
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
        'as' => 'generated::TYRJabO7MTQliD7J',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ruhcQAh0JtrOTAs7' => 
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
        'as' => 'generated::ruhcQAh0JtrOTAs7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::k8k616AxNIulkNdT' => 
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
        'as' => 'generated::k8k616AxNIulkNdT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Cvo51RuYudixWeDg' => 
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
        'as' => 'generated::Cvo51RuYudixWeDg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ZpqjjDYuj4ZAnQWo' => 
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
        'as' => 'generated::ZpqjjDYuj4ZAnQWo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Yg5TVqwCIKfEMbfN' => 
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
        'as' => 'generated::Yg5TVqwCIKfEMbfN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::D3OlEpsH9aFLuM14' => 
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
        'as' => 'generated::D3OlEpsH9aFLuM14',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::czgnQKPJB3QANqPf' => 
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
        'as' => 'generated::czgnQKPJB3QANqPf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Se7x3IoFseC4b8XQ' => 
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
        'as' => 'generated::Se7x3IoFseC4b8XQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::l91JL4IKFnNxrwBl' => 
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
        'as' => 'generated::l91JL4IKFnNxrwBl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zUUmvgNw7k4wWh7X' => 
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
        'as' => 'generated::zUUmvgNw7k4wWh7X',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fuLgrJDD5wRmI8hj' => 
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
        'as' => 'generated::fuLgrJDD5wRmI8hj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::LojfIIIo4yG65CBr' => 
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
        'as' => 'generated::LojfIIIo4yG65CBr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::q8ToJpE8w5RenG2w' => 
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
        'as' => 'generated::q8ToJpE8w5RenG2w',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Zd0irxwn7dVzVAwM' => 
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
        'as' => 'generated::Zd0irxwn7dVzVAwM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1ZwN8q0ptAs8Gbcx' => 
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
        'as' => 'generated::1ZwN8q0ptAs8Gbcx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::jS1Z5VAoIPlTkgno' => 
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
        'as' => 'generated::jS1Z5VAoIPlTkgno',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::FgORbVCROJwRzNkC' => 
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
        'as' => 'generated::FgORbVCROJwRzNkC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::DciihWRuRdbP1Xmi' => 
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
        'as' => 'generated::DciihWRuRdbP1Xmi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3x26gdLMp3kdqdNT' => 
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
        'as' => 'generated::3x26gdLMp3kdqdNT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ICqX8yzmicjnGMZX' => 
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
        'as' => 'generated::ICqX8yzmicjnGMZX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::UBNvDRNQrFB4Emq2' => 
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
        'as' => 'generated::UBNvDRNQrFB4Emq2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::I6yQtCbE72afxMGe' => 
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
        'as' => 'generated::I6yQtCbE72afxMGe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::jW8aleygf53R0Gh6' => 
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
        'as' => 'generated::jW8aleygf53R0Gh6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::YW7abpkbj4TicINI' => 
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
        'as' => 'generated::YW7abpkbj4TicINI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Re0OLFalwUVjbfGU' => 
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
        'as' => 'generated::Re0OLFalwUVjbfGU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::cL8UdW3yUZc6HgtS' => 
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
        'as' => 'generated::cL8UdW3yUZc6HgtS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::JzMvqYMolYBxvaZa' => 
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
        'as' => 'generated::JzMvqYMolYBxvaZa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VfIuOFjT3OT08TpX' => 
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
        'as' => 'generated::VfIuOFjT3OT08TpX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rZAee1Kx7VGtmQWH' => 
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
        'as' => 'generated::rZAee1Kx7VGtmQWH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::J8KyMsKhfavU5TUe' => 
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
        'as' => 'generated::J8KyMsKhfavU5TUe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::UbOIpoY21u8yjbi6' => 
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
        'as' => 'generated::UbOIpoY21u8yjbi6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::2ZRNhqk5D4K6lhil' => 
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
        'as' => 'generated::2ZRNhqk5D4K6lhil',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Two0Jq4i6aKVI9y8' => 
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
        'as' => 'generated::Two0Jq4i6aKVI9y8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::PZc99g18GUmNxg80' => 
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
        'as' => 'generated::PZc99g18GUmNxg80',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::5qaiZjmZBQV33d3B' => 
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
        'as' => 'generated::5qaiZjmZBQV33d3B',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9y4XiuWY9LAN0R9V' => 
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
        'as' => 'generated::9y4XiuWY9LAN0R9V',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::EywB9f7ML3wXam1x' => 
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
        'as' => 'generated::EywB9f7ML3wXam1x',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Y91M1bRkk63llzPx' => 
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
        'as' => 'generated::Y91M1bRkk63llzPx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::lu3IVKcc7Up2U0nC' => 
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
        'as' => 'generated::lu3IVKcc7Up2U0nC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::hFVZFONesaZeKTpD' => 
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
        'as' => 'generated::hFVZFONesaZeKTpD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6fMUu8SbBEQtB6oC' => 
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
        'as' => 'generated::6fMUu8SbBEQtB6oC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3NPzxm54DSQpRqPt' => 
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
        'as' => 'generated::3NPzxm54DSQpRqPt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::0oc6KVbJz7rsQFQN' => 
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
        'as' => 'generated::0oc6KVbJz7rsQFQN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::iVjlGSciSxdVz05n' => 
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
        'as' => 'generated::iVjlGSciSxdVz05n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::T0VOMdX24CPbzld7' => 
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
        'as' => 'generated::T0VOMdX24CPbzld7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XZ2Kg7wCYY5VHQMx' => 
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
        'as' => 'generated::XZ2Kg7wCYY5VHQMx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ibYGqEm0eiCHP8vu' => 
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
        'as' => 'generated::ibYGqEm0eiCHP8vu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3PIvOmOPsT6yX7GV' => 
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
        'as' => 'generated::3PIvOmOPsT6yX7GV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Iarm0Qn2JDyo4KyB' => 
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
        'as' => 'generated::Iarm0Qn2JDyo4KyB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::PwiUNd8gls7cpCPn' => 
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
        'as' => 'generated::PwiUNd8gls7cpCPn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Nmuficd2LHFYvc2b' => 
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
        'as' => 'generated::Nmuficd2LHFYvc2b',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::8JhvDJxckQA7w0aE' => 
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
        'as' => 'generated::8JhvDJxckQA7w0aE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::nnCyIXFQzZXXjE2J' => 
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
        'as' => 'generated::nnCyIXFQzZXXjE2J',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ZDEIiVSFQni2BReH' => 
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
        'as' => 'generated::ZDEIiVSFQni2BReH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wzjXHQ2MCaUZGYBI' => 
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
        'as' => 'generated::wzjXHQ2MCaUZGYBI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7nMSB0PRywrf64Wz' => 
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
        'as' => 'generated::7nMSB0PRywrf64Wz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::LG57eFGVYVJZ0cE3' => 
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":256:{@Rf/7b57shqXPkvnSj3pHTWR+d7Rqj+f0wDZe6jKHOyo=.a:5:{s:3:"use";a:0:{}s:8:"function";s:44:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000632d2c71000000002da2c589";}}',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::LG57eFGVYVJZ0cE3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":290:{@fKhmjOGB43YvKQLgvmZStRf5QPd5VOJAtH2U3EBnWnw=.a:5:{s:3:"use";a:0:{}s:8:"function";s:78:"function ($token) {
    return \\view(\'password.reset\', [\'token\' => $token]);
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000632d2ffc000000002da2c589";}}',
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
