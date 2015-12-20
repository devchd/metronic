<?php

return [
	'titles' => [
        "index" => "Appestablishments",
        "new" => "New Appestablishments",
        "edit" => "Edit Appestablishments",
        "delete" => "Delete Appestablishments"
    ],
	'fields' => [
        "id" => "ID",
        "name" => "Name",
        "image" => "Image Url",
        "category" => "Category",
        "description" => "Description",
        "address" => "Address",
        "lat" => "Latitude",
        "lon" => "Longitude",
        "site" => "Site Url",
        "phone" => "Phone",
        "status"=> "Status"
    ],
	'buttons' => [
        "register" => "Register",
        "update" => "Update",
        "cancel" => "Cancel",
        "yes" => "Yes",
        "no" => "No"
    ],
	'notifications' => [
        "register_successful" => "The appestablishments has been successfully registered.",
        "update_successful" => "The appestablishments has been successfully updated.",
        "activated_successful" => "The appestablishments has been successfully activated.",
        "deactivated_successful" => "The appestablishments has been successfully deactivated.",
        "delete_successful" => "The appestablishments has been successfully deleted.",
        "already_register" => "The appestablishments had been registered previously.",
        "no_exists" => "The appestablishments does not exist.",
        "delete_confirmation" => "Are you sure, that you will delete selected appestablishments?",
        "field_name_missing" => "The field name is required.",
        "field_image_missing" => "The field image is required.",
        "field_category_missing" => "The field category is required.",
        "field_description_missing" => "The field description is required.",
        "field_address_missing" => "The field address is required.",
        "field_lat_missing" => "The field latitude is required.",
        "field_lon_missing" => "The field longitude is required."
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
