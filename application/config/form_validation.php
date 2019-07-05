<?php
$config = array(
    array(
        'field' => 'nombre',
        'label' => 'Empresa',
        'rules' => 'trim|required|max_length[50]',
        'errors' => array(
            'required' => '* El %s es requerido',
            'max_length' => 'uso máximo de 50 carácteres'
        )
    ),
    array(
        'field' => 'razsoc',
        'label' => 'Razón social',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'direccion',
        'label' => 'Dirección',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'municipio',
        'label' => 'Municipio',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'descripcion',
        'label' => 'Descripción',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'sector',
        'label' => 'Sector Económico',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'fundacion',
        'label' => 'Fecha Fundación',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'correo',
        'label' => 'Correo',
        'rules' => 'trim|required|valid_email',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'telefono',
        'label' => 'Teléfono',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'iva',
        'label' => 'IVA',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'nit',
        'label' => 'NIT',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'contacto',
        'label' => 'Contacto',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'tel',
        'label' => 'Teléfono de contacto',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'mail',
        'label' => 'Correo de contacto',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'cargo',
        'label' => 'Cargo en la empresa',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'propietario',
        'label' => 'Propietario de la empresa',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'representante',
        'label' => 'Representante legal',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
    array(
        'field' => 'suscripcion',
        'label' => 'Tipo de suscripción',
        'rules' => 'trim|required',
        'errors' => array(
            'required' => '* El %s es requerido'
        )
    ),
   /*  array(
        'field' => 'usua',
        'label' => 'Nombre de usuario',
        'rules' => 'trim|regex_match[/[a-z]{5,10}/]|required',
        'errors' => array(
            'required' => '* El %s es requerido',
            'regex_match' => 'El campo %s no cumple el formato'
        )
    ),
    array(
        'field' => 'clave',
        'label' => 'Contraseña',
        'rules' => 'trim|regex_match[/[1-9]{5,10}/]|required',
        'errors' => array(
            'required' => '* El %s es requerido',
            'regex_match' => 'El campo %s no cumple el formato'
        )
    ), */
);