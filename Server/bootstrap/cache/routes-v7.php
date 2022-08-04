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
            '_route' => 'generated::qYbmogg6zyYSc6da',
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
            '_route' => 'generated::XiLMu8DXBRHc1jP0',
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
            '_route' => 'generated::ZHnmhPpwXgwbi5cm',
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
            '_route' => 'generated::B3LnukJuEU79UIe6',
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
            '_route' => 'generated::z6fdNwtBoO2FnuPi',
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
            '_route' => 'generated::XKGq1GC5r4gFB1Fc',
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
            '_route' => 'generated::wXfC6uGDbdz0vkRD',
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
            '_route' => 'generated::MdeIXozUh3ugHuMW',
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
            '_route' => 'generated::9CnDAW78fMfv7FbB',
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
            '_route' => 'generated::s1Yk002zJqp02dm0',
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
            '_route' => 'generated::94ahMQbqSvk950ev',
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
            '_route' => 'generated::xUrUPFNevJ9UfbnF',
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
            '_route' => 'generated::IMzlvMyfPqycxMFi',
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
            '_route' => 'generated::zLEPiB8G2jORe2ON',
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
            '_route' => 'generated::RvukthdoTN1rxHEy',
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
            '_route' => 'generated::gguAkNu0zj2El0MP',
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
            '_route' => 'generated::sXJuRlJGQ2wbVLEt',
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
            '_route' => 'generated::I0DWgJRlAFiXg4mX',
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
            '_route' => 'generated::XuUTWoHifoCdWNOx',
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
            '_route' => 'generated::lERHWHoafzaPS18Z',
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
            '_route' => 'generated::GFVLdtimhbhrZmgB',
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
            '_route' => 'generated::1FItaepeKRlslphl',
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
            '_route' => 'generated::bZiyNBehhIwUkgre',
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
            '_route' => 'generated::LuJ0N6bIkuDf0iy8',
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
            '_route' => 'generated::qZA1g0oyVO1WtMdN',
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
            '_route' => 'generated::XhIIbAY9O3tpU35k',
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
            '_route' => 'generated::q7FCnKlITSegshAg',
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
            '_route' => 'generated::jdxAsS0rfJrz5fyM',
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
            '_route' => 'generated::QF2AZQeYW1sSpcIy',
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
            '_route' => 'generated::6N8lwK1LPHldtTFK',
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
            '_route' => 'generated::XzYNAVFT2dVyw6ex',
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
            '_route' => 'generated::hjhcpyo1KXWKO4EA',
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
            '_route' => 'generated::Lwy6jjt9ijupiPof',
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
            '_route' => 'generated::wDxfCytVPXjld05s',
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
            '_route' => 'generated::CIjZ5JxJOW3P7w6F',
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
            '_route' => 'generated::HlCzAinUcUzvNZfB',
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
            '_route' => 'generated::q3fgLZW3WbDtywXy',
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
            '_route' => 'generated::6YxClf3CHdHYmbQF',
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
            '_route' => 'generated::jeblYIpRKfccBmtr',
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
            '_route' => 'generated::GDaYsVYxFuucATcq',
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
            '_route' => 'generated::QVmh1dieWMkf9Hm6',
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
            '_route' => 'generated::qTu5Eow21qjxkTet',
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
            '_route' => 'generated::dW4ko4ipLLXnexCR',
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
            '_route' => 'generated::CPhdopk4qjyTpPPH',
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
            '_route' => 'generated::FhdhkJaxhpSvW5Hh',
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
            '_route' => 'generated::Vw9ouycsaU4Ms8P8',
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
            '_route' => 'generated::gilzifecXczcmghK',
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
            '_route' => 'generated::BM0phS9k4vg9ylaB',
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
            '_route' => 'generated::XBFhepKCIJ9YiHcN',
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
            '_route' => 'generated::9Fb9dajaDPcksIVb',
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
            '_route' => 'generated::Mf8TG2TK9f19pzwl',
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
            '_route' => 'generated::xptYD5C18JUg5ynV',
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
            '_route' => 'generated::WCQBCIJzL1rCDOyo',
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
            '_route' => 'generated::st8foPIsQwUMKRGA',
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
            '_route' => 'generated::VSmczCmcwcCOc1li',
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
            '_route' => 'generated::TyFZq45bEIWsArjS',
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
            '_route' => 'generated::iAc5zyu3JYpiYAQo',
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
            '_route' => 'generated::vrFgRpmGwpryfPXa',
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
            '_route' => 'generated::7NdPbfBMWCT5jSgm',
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
            '_route' => 'generated::ppVgVJNaEIrP3NII',
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
            '_route' => 'generated::5fYeMCCN6Zx0ffV6',
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
            '_route' => 'generated::HndVIxh6X14MLVw8',
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
            '_route' => 'generated::TcCmKpzHDwhZ655p',
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
            '_route' => 'generated::VoixeEzmCUc2lPrY',
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
            '_route' => 'generated::hCaB0ZFVa438m7Zl',
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
            '_route' => 'generated::DWWJ013q3rISExVz',
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
            '_route' => 'generated::r1suC709UwKwE8cD',
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
            '_route' => 'generated::niqDxsJnMIIa8No8',
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
            '_route' => 'generated::AnTvMT0hKFTzhO4H',
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
            '_route' => 'generated::3xfp9ar9me2luLCW',
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
            '_route' => 'generated::OIn3AyPai1laxNRi',
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
            '_route' => 'generated::QxDzVLYR0HyBVS4y',
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
            '_route' => 'generated::knJ65dJ20EcqOjll',
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
            '_route' => 'generated::DnXFuiSqSeBjfm5c',
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
            '_route' => 'generated::aOusD4iIc0qh9RaW',
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
            '_route' => 'generated::uJ3ZanHRY7YfLUXD',
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
            '_route' => 'generated::3ZHHodXUDHnz0BZe',
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
            '_route' => 'generated::GiGNN1LyDShcY3KK',
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
            '_route' => 'generated::QnqsUzxmvbVfhkTL',
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
            '_route' => 'generated::Jd5RkDoDfaXMz3MK',
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
            '_route' => 'generated::SWtP8XGoHp9gH2PT',
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
            '_route' => 'generated::938aYQcaDH1fTtdB',
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
            '_route' => 'generated::2XvKWSi3vg5OOTxb',
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
            '_route' => 'generated::GAxGA9GYjJs6exSB',
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
            '_route' => 'generated::wmUmfID1honvQc5J',
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
            '_route' => 'generated::tSXX0O6tH6p5Sz8g',
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
            '_route' => 'generated::a4QEK8rEGYEnJiTR',
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
            '_route' => 'generated::tYYREIF0lhM5fwT9',
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
            '_route' => 'generated::fVWGm8VQ2UgYI619',
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
            '_route' => 'generated::lAV2OOxLDfAk7RaI',
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
            '_route' => 'generated::fkoj3T4ARGNlHrCw',
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
            '_route' => 'generated::KQRHtrIaBb51YE9V',
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
            '_route' => 'generated::MwYYO7GOGdHml8jS',
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
            '_route' => 'generated::mXn1oLUjiwCB6JVT',
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
            '_route' => 'generated::rUioOmTSiRxooFJJ',
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
            '_route' => 'generated::JVAq0jAGXhzDQ4if',
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
            '_route' => 'generated::4jWflFVRX2GVsJkA',
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
            '_route' => 'generated::NgMNOV3RVdXdSJIO',
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
            '_route' => 'generated::OPDEPeEhZeYvRd1R',
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
            '_route' => 'generated::t9W6nvB051bNHOFh',
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
            '_route' => 'generated::dtwFBhswJngecMHd',
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
            '_route' => 'generated::VWiw7zilQ8QoISwx',
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
            '_route' => 'generated::kLaIkj1mMRFX3jCc',
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
            '_route' => 'generated::0p7jALzOHugVcqGe',
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
            '_route' => 'generated::UU2xiFHu9FfjNIHC',
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
            '_route' => 'generated::UrDxGWvqLbN2alof',
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
            '_route' => 'generated::OEE40rLYGG6Vob8S',
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
            '_route' => 'generated::R06FX8XSE3VV8RG2',
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
            '_route' => 'generated::UeFvPHjOIyeSYjs0',
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
            '_route' => 'generated::EJYUsITW9h9P1xwI',
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
            '_route' => 'generated::0K8yfbVaRu80XJpj',
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
            '_route' => 'generated::ecjzb1Kb7gyH63FR',
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
            '_route' => 'generated::Gh2sml9wmbjHavSg',
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
            '_route' => 'generated::mRBOh1sHhSb5gyKv',
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
            '_route' => 'generated::bnud2FMgBZ5VnOYq',
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
            '_route' => 'generated::nL0BXy85pRSkSp38',
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
            '_route' => 'generated::7A9mLgYUsRZwiYvc',
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
            '_route' => 'generated::SyEAqESXldWV6J6p',
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
            '_route' => 'generated::X3HVyl4fjXvU96ZG',
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
            '_route' => 'generated::POao0GWdf3RvB0EI',
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
            '_route' => 'generated::qRbezQC7d78Eh4ob',
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
            '_route' => 'generated::w4nxZD3mirU5g4Eb',
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
            '_route' => 'generated::LGk4tW6TWBFGPTPi',
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
            '_route' => 'generated::WEPxL00ssEJkbooC',
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
            '_route' => 'generated::tJAy8O4klBK1Rezy',
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
            '_route' => 'generated::K90S4e4ncwAe3u5H',
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
            '_route' => 'generated::RWhKohWw26dDACdM',
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
    'generated::qYbmogg6zyYSc6da' => 
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
        'as' => 'generated::qYbmogg6zyYSc6da',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XiLMu8DXBRHc1jP0' => 
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
        'as' => 'generated::XiLMu8DXBRHc1jP0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ZHnmhPpwXgwbi5cm' => 
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
        'as' => 'generated::ZHnmhPpwXgwbi5cm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::B3LnukJuEU79UIe6' => 
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
        'as' => 'generated::B3LnukJuEU79UIe6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::z6fdNwtBoO2FnuPi' => 
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
        'as' => 'generated::z6fdNwtBoO2FnuPi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XKGq1GC5r4gFB1Fc' => 
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
        'as' => 'generated::XKGq1GC5r4gFB1Fc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wXfC6uGDbdz0vkRD' => 
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
        'as' => 'generated::wXfC6uGDbdz0vkRD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::MdeIXozUh3ugHuMW' => 
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
        'as' => 'generated::MdeIXozUh3ugHuMW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9CnDAW78fMfv7FbB' => 
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
        'as' => 'generated::9CnDAW78fMfv7FbB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::s1Yk002zJqp02dm0' => 
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
        'as' => 'generated::s1Yk002zJqp02dm0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::94ahMQbqSvk950ev' => 
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
        'as' => 'generated::94ahMQbqSvk950ev',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::xUrUPFNevJ9UfbnF' => 
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
        'as' => 'generated::xUrUPFNevJ9UfbnF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::IMzlvMyfPqycxMFi' => 
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
        'as' => 'generated::IMzlvMyfPqycxMFi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zLEPiB8G2jORe2ON' => 
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
        'as' => 'generated::zLEPiB8G2jORe2ON',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::RvukthdoTN1rxHEy' => 
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
        'as' => 'generated::RvukthdoTN1rxHEy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::gguAkNu0zj2El0MP' => 
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
        'as' => 'generated::gguAkNu0zj2El0MP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::sXJuRlJGQ2wbVLEt' => 
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
        'as' => 'generated::sXJuRlJGQ2wbVLEt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::I0DWgJRlAFiXg4mX' => 
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
        'as' => 'generated::I0DWgJRlAFiXg4mX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XuUTWoHifoCdWNOx' => 
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
        'as' => 'generated::XuUTWoHifoCdWNOx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::lERHWHoafzaPS18Z' => 
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
        'as' => 'generated::lERHWHoafzaPS18Z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GFVLdtimhbhrZmgB' => 
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
        'as' => 'generated::GFVLdtimhbhrZmgB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1FItaepeKRlslphl' => 
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
        'as' => 'generated::1FItaepeKRlslphl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bZiyNBehhIwUkgre' => 
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
        'as' => 'generated::bZiyNBehhIwUkgre',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::LuJ0N6bIkuDf0iy8' => 
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
        'as' => 'generated::LuJ0N6bIkuDf0iy8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qZA1g0oyVO1WtMdN' => 
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
        'as' => 'generated::qZA1g0oyVO1WtMdN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XhIIbAY9O3tpU35k' => 
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
        'as' => 'generated::XhIIbAY9O3tpU35k',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::q7FCnKlITSegshAg' => 
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
        'as' => 'generated::q7FCnKlITSegshAg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::jdxAsS0rfJrz5fyM' => 
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
        'as' => 'generated::jdxAsS0rfJrz5fyM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::QF2AZQeYW1sSpcIy' => 
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
        'as' => 'generated::QF2AZQeYW1sSpcIy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6N8lwK1LPHldtTFK' => 
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
        'as' => 'generated::6N8lwK1LPHldtTFK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XzYNAVFT2dVyw6ex' => 
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
        'as' => 'generated::XzYNAVFT2dVyw6ex',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::hjhcpyo1KXWKO4EA' => 
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
        'as' => 'generated::hjhcpyo1KXWKO4EA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Lwy6jjt9ijupiPof' => 
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
        'as' => 'generated::Lwy6jjt9ijupiPof',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wDxfCytVPXjld05s' => 
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
        'as' => 'generated::wDxfCytVPXjld05s',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::CIjZ5JxJOW3P7w6F' => 
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
        'as' => 'generated::CIjZ5JxJOW3P7w6F',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::HlCzAinUcUzvNZfB' => 
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
        'as' => 'generated::HlCzAinUcUzvNZfB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::q3fgLZW3WbDtywXy' => 
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
        'as' => 'generated::q3fgLZW3WbDtywXy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6YxClf3CHdHYmbQF' => 
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
        'as' => 'generated::6YxClf3CHdHYmbQF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::jeblYIpRKfccBmtr' => 
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
        'as' => 'generated::jeblYIpRKfccBmtr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GDaYsVYxFuucATcq' => 
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
        'as' => 'generated::GDaYsVYxFuucATcq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::QVmh1dieWMkf9Hm6' => 
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
        'as' => 'generated::QVmh1dieWMkf9Hm6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qTu5Eow21qjxkTet' => 
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
        'as' => 'generated::qTu5Eow21qjxkTet',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::dW4ko4ipLLXnexCR' => 
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
        'as' => 'generated::dW4ko4ipLLXnexCR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::CPhdopk4qjyTpPPH' => 
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
        'as' => 'generated::CPhdopk4qjyTpPPH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::FhdhkJaxhpSvW5Hh' => 
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
        'as' => 'generated::FhdhkJaxhpSvW5Hh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Vw9ouycsaU4Ms8P8' => 
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
        'as' => 'generated::Vw9ouycsaU4Ms8P8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::gilzifecXczcmghK' => 
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
        'as' => 'generated::gilzifecXczcmghK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BM0phS9k4vg9ylaB' => 
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
        'as' => 'generated::BM0phS9k4vg9ylaB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XBFhepKCIJ9YiHcN' => 
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
        'as' => 'generated::XBFhepKCIJ9YiHcN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9Fb9dajaDPcksIVb' => 
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
        'as' => 'generated::9Fb9dajaDPcksIVb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Mf8TG2TK9f19pzwl' => 
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
        'as' => 'generated::Mf8TG2TK9f19pzwl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::xptYD5C18JUg5ynV' => 
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
        'as' => 'generated::xptYD5C18JUg5ynV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::WCQBCIJzL1rCDOyo' => 
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
        'as' => 'generated::WCQBCIJzL1rCDOyo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::st8foPIsQwUMKRGA' => 
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
        'as' => 'generated::st8foPIsQwUMKRGA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VSmczCmcwcCOc1li' => 
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
        'as' => 'generated::VSmczCmcwcCOc1li',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::TyFZq45bEIWsArjS' => 
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
        'as' => 'generated::TyFZq45bEIWsArjS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::iAc5zyu3JYpiYAQo' => 
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
        'as' => 'generated::iAc5zyu3JYpiYAQo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::vrFgRpmGwpryfPXa' => 
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
        'as' => 'generated::vrFgRpmGwpryfPXa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7NdPbfBMWCT5jSgm' => 
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
        'as' => 'generated::7NdPbfBMWCT5jSgm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ppVgVJNaEIrP3NII' => 
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
        'as' => 'generated::ppVgVJNaEIrP3NII',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::5fYeMCCN6Zx0ffV6' => 
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
        'as' => 'generated::5fYeMCCN6Zx0ffV6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::HndVIxh6X14MLVw8' => 
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
        'as' => 'generated::HndVIxh6X14MLVw8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::TcCmKpzHDwhZ655p' => 
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
        'as' => 'generated::TcCmKpzHDwhZ655p',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VoixeEzmCUc2lPrY' => 
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
        'as' => 'generated::VoixeEzmCUc2lPrY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::hCaB0ZFVa438m7Zl' => 
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
        'as' => 'generated::hCaB0ZFVa438m7Zl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::DWWJ013q3rISExVz' => 
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
        'as' => 'generated::DWWJ013q3rISExVz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::r1suC709UwKwE8cD' => 
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
        'as' => 'generated::r1suC709UwKwE8cD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::niqDxsJnMIIa8No8' => 
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
        'as' => 'generated::niqDxsJnMIIa8No8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::AnTvMT0hKFTzhO4H' => 
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
        'as' => 'generated::AnTvMT0hKFTzhO4H',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3xfp9ar9me2luLCW' => 
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
        'as' => 'generated::3xfp9ar9me2luLCW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::OIn3AyPai1laxNRi' => 
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
        'as' => 'generated::OIn3AyPai1laxNRi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::QxDzVLYR0HyBVS4y' => 
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
        'as' => 'generated::QxDzVLYR0HyBVS4y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::knJ65dJ20EcqOjll' => 
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
        'as' => 'generated::knJ65dJ20EcqOjll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::DnXFuiSqSeBjfm5c' => 
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
        'as' => 'generated::DnXFuiSqSeBjfm5c',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::aOusD4iIc0qh9RaW' => 
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
        'as' => 'generated::aOusD4iIc0qh9RaW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::uJ3ZanHRY7YfLUXD' => 
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
        'as' => 'generated::uJ3ZanHRY7YfLUXD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3ZHHodXUDHnz0BZe' => 
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
        'as' => 'generated::3ZHHodXUDHnz0BZe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GiGNN1LyDShcY3KK' => 
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
        'as' => 'generated::GiGNN1LyDShcY3KK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::QnqsUzxmvbVfhkTL' => 
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
        'as' => 'generated::QnqsUzxmvbVfhkTL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Jd5RkDoDfaXMz3MK' => 
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
        'as' => 'generated::Jd5RkDoDfaXMz3MK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::SWtP8XGoHp9gH2PT' => 
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
        'as' => 'generated::SWtP8XGoHp9gH2PT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::938aYQcaDH1fTtdB' => 
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
        'as' => 'generated::938aYQcaDH1fTtdB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::2XvKWSi3vg5OOTxb' => 
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
        'as' => 'generated::2XvKWSi3vg5OOTxb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GAxGA9GYjJs6exSB' => 
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
        'as' => 'generated::GAxGA9GYjJs6exSB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wmUmfID1honvQc5J' => 
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
        'as' => 'generated::wmUmfID1honvQc5J',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::tSXX0O6tH6p5Sz8g' => 
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
        'as' => 'generated::tSXX0O6tH6p5Sz8g',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::a4QEK8rEGYEnJiTR' => 
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
        'as' => 'generated::a4QEK8rEGYEnJiTR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::tYYREIF0lhM5fwT9' => 
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
        'as' => 'generated::tYYREIF0lhM5fwT9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fVWGm8VQ2UgYI619' => 
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
        'as' => 'generated::fVWGm8VQ2UgYI619',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::lAV2OOxLDfAk7RaI' => 
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
        'as' => 'generated::lAV2OOxLDfAk7RaI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fkoj3T4ARGNlHrCw' => 
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
        'as' => 'generated::fkoj3T4ARGNlHrCw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::KQRHtrIaBb51YE9V' => 
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
        'as' => 'generated::KQRHtrIaBb51YE9V',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::MwYYO7GOGdHml8jS' => 
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
        'as' => 'generated::MwYYO7GOGdHml8jS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::mXn1oLUjiwCB6JVT' => 
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
        'as' => 'generated::mXn1oLUjiwCB6JVT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rUioOmTSiRxooFJJ' => 
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
        'as' => 'generated::rUioOmTSiRxooFJJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::JVAq0jAGXhzDQ4if' => 
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
        'as' => 'generated::JVAq0jAGXhzDQ4if',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4jWflFVRX2GVsJkA' => 
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
        'as' => 'generated::4jWflFVRX2GVsJkA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::NgMNOV3RVdXdSJIO' => 
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
        'as' => 'generated::NgMNOV3RVdXdSJIO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::OPDEPeEhZeYvRd1R' => 
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
        'as' => 'generated::OPDEPeEhZeYvRd1R',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::t9W6nvB051bNHOFh' => 
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
        'as' => 'generated::t9W6nvB051bNHOFh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::dtwFBhswJngecMHd' => 
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
        'as' => 'generated::dtwFBhswJngecMHd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VWiw7zilQ8QoISwx' => 
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
        'as' => 'generated::VWiw7zilQ8QoISwx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::kLaIkj1mMRFX3jCc' => 
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
        'as' => 'generated::kLaIkj1mMRFX3jCc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::0p7jALzOHugVcqGe' => 
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
        'as' => 'generated::0p7jALzOHugVcqGe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::UU2xiFHu9FfjNIHC' => 
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
        'as' => 'generated::UU2xiFHu9FfjNIHC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::UrDxGWvqLbN2alof' => 
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
        'as' => 'generated::UrDxGWvqLbN2alof',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::OEE40rLYGG6Vob8S' => 
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
        'as' => 'generated::OEE40rLYGG6Vob8S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::R06FX8XSE3VV8RG2' => 
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
        'as' => 'generated::R06FX8XSE3VV8RG2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::UeFvPHjOIyeSYjs0' => 
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
        'as' => 'generated::UeFvPHjOIyeSYjs0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::EJYUsITW9h9P1xwI' => 
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
        'as' => 'generated::EJYUsITW9h9P1xwI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::0K8yfbVaRu80XJpj' => 
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
        'as' => 'generated::0K8yfbVaRu80XJpj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ecjzb1Kb7gyH63FR' => 
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
        'as' => 'generated::ecjzb1Kb7gyH63FR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Gh2sml9wmbjHavSg' => 
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
        'as' => 'generated::Gh2sml9wmbjHavSg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::mRBOh1sHhSb5gyKv' => 
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
        'as' => 'generated::mRBOh1sHhSb5gyKv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bnud2FMgBZ5VnOYq' => 
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
        'as' => 'generated::bnud2FMgBZ5VnOYq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::nL0BXy85pRSkSp38' => 
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
        'as' => 'generated::nL0BXy85pRSkSp38',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7A9mLgYUsRZwiYvc' => 
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
        'as' => 'generated::7A9mLgYUsRZwiYvc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::SyEAqESXldWV6J6p' => 
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
        'as' => 'generated::SyEAqESXldWV6J6p',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::X3HVyl4fjXvU96ZG' => 
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
        'as' => 'generated::X3HVyl4fjXvU96ZG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::POao0GWdf3RvB0EI' => 
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
        'as' => 'generated::POao0GWdf3RvB0EI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qRbezQC7d78Eh4ob' => 
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
        'as' => 'generated::qRbezQC7d78Eh4ob',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::w4nxZD3mirU5g4Eb' => 
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
        'as' => 'generated::w4nxZD3mirU5g4Eb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::LGk4tW6TWBFGPTPi' => 
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
        'as' => 'generated::LGk4tW6TWBFGPTPi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::WEPxL00ssEJkbooC' => 
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
        'as' => 'generated::WEPxL00ssEJkbooC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::tJAy8O4klBK1Rezy' => 
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
        'as' => 'generated::tJAy8O4klBK1Rezy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::K90S4e4ncwAe3u5H' => 
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
        'as' => 'generated::K90S4e4ncwAe3u5H',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::RWhKohWw26dDACdM' => 
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":256:{@u9t5kYlqShf+WhoIjRgBUgOihA74mhS8cIqw1FxeXOU=.a:5:{s:3:"use";a:0:{}s:8:"function";s:44:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000001671f880000000026a7c7f5";}}',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::RWhKohWw26dDACdM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":290:{@0m5Qz0e5z997hxptcZmbZOR0ogjWmct/gSF6SnrmKN8=.a:5:{s:3:"use";a:0:{}s:8:"function";s:78:"function ($token) {
    return \\view(\'password.reset\', [\'token\' => $token]);
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000001671c050000000026a7c7f5";}}',
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
