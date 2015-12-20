<?php

return [
	'titles' => [
        "index" => "Appcodes",
        "new" => "New Appcodes",
        "edit" => "Edit Appcodes",
        "delete" => "Delete Appcodes"
    ],
	'fields' => [
        "id" => "ID",
        "benefit_id" => "Benefit ID",
        "number" => "Number",
        "bar_code"=> "Bar Code",
        "status" => "Status",
        "client"=> "Client",
        "single_use"=>"Single Use"
    ],
	'buttons' => [
        "register" => "Register",
        "update" => "Update",
        "cancel" => "Cancel",
        "yes" => "Yes",
        "no" => "No"
    ],
	'notifications' => [
        "register_successful" => "The appcodes has been successfully registered.",
        "update_successful" => "The appcodes has been successfully updated.",
        "activated_successful" => "The appcodes has been successfully activated.",
        "deactivated_successful" => "The appcodes has been successfully deactivated.",
        "delete_successful" => "The appcodes has been successfully deleted.",
        "already_register" => "The appcodes had been registered previously.",
        "no_exists" => "The appcodes does not exist.",
        "delete_confirmation" => "Are you sure, that you will delete selected appcodes?",
        "field_number_missing" => "The field number is required.",
        "field_bar_code_missing" => "The field barcode is required.",
        "field_bar_client_missing" => "The field client is required."
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
