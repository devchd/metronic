<?php

return [
	'titles' => [
        "index" => "Tb_App_Categories",
        "new" => "New Tb_App_Categories",
        "edit" => "Edit Tb_App_Categories",
        "delete" => "Delete Tb_App_Categories"
    ],
	'fields' => [
        "name" => "Name",
        "active" => "Active"
    ],
	'buttons' => [
        "register" => "Register",
        "update" => "Update",
        "cancel" => "Cancel",
        "yes" => "Yes",
        "no" => "No"
    ],
	'notifications' => [
        "register_successful" => "The tb_app_categories has been successfully registered.",
        "update_successful" => "The tb_app_categories has been successfully updated.",
        "activated_successful" => "The tb_app_categories has been successfully activated.",
        "deactivated_successful" => "The tb_app_categories has been successfully deactivated.",
        "delete_successful" => "The tb_app_categories has been successfully deleted.",
        "already_register" => "The tb_app_categories had been registered previously.",
        "no_exists" => "The tb_app_categories does not exist.",
        "delete_confirmation" => "Are you sure, that you will delete selected tb_app_categories?",
        "field_name_missing" => "The field name is required.",
        "field_active_missing" => "The field active is required."
    ],
	'validations' => [
        "required" => "This field is required.",
        "email" => "This field is an invalid email.",
        "digits" => "This field only accepts digits.",
        "number" => "This field only accepts numeric values.",
        "minlength" => "the minimum length of the field is {0}.",
        "maxlength" => "the maximum length of the field is {0}."
    ]
];
