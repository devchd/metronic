<?php

return [
	'titles' => [
        "index" => "Appbenefits",
        "new" => "New Appbenefits",
        "edit" => "Edit Appbenefits",
        "delete" => "Delete Appbenefits"
    ],
	'fields' => [
        "id" => "ID",
        "establishment_id" => "Establishment ID",
        "category" =>"Category",
        "description" => "Description",
        "status"=>"Status",
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
        "register_successful" => "The appbenefits has been successfully registered.",
        "update_successful" => "The appbenefits has been successfully updated.",
        "activated_successful" => "The appbenefits has been successfully activated.",
        "deactivated_successful" => "The appbenefits has been successfully deactivated.",
        "delete_successful" => "The appbenefits has been successfully deleted.",
        "already_register" => "The appbenefits had been registered previously.",
        "no_exists" => "The appbenefits does not exist.",
        "delete_confirmation" => "Are you sure, that you will delete selected appbenefits?",
        "field_category_missing" => "The field category is required.",
        "field_description_missing" => "The field description is required."
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
