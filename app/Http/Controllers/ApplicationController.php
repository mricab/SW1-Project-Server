<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DiscoveryController;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class ApplicationController extends Controller
{
    static public function CreateUserEnvironment(User $user)
    {
        return "93d68c22-1be5-47b6-aa72-9684aabceed7";

        $name = $user->name();
        $description = $user->name() . "'s environment.";
        $response = DiscoveryController::EnvironmentsCreate($name, $description);

        if($response->ok()) {
            return $response->collect()['environment_id'];
        } else {
            return false;
        }
    }

    static public function CreateUserCollection(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:6|max:100',
            'description' => 'required|string|min:6|max:200',
            'language' => 'required|string|min:5|min:5',
        ]);

        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $environmentId = $request->user()->environment;
        $configurationId = "ed09d296-fc3d-49d4-832e-0ebaa2d9f23e"; // Default configuration

        $response = DiscoveryController::CollectionsCreate(
            $environmentId, $configurationId,
            $request->input('name'),
            $request->input('description'),
            $request->input('language'),
        );

        if($response->status() == 400) {
            $response = ['errors' => 'Folders limit reached.'];
            return response($response, 400);
        }

        $response = ['message' => 'Folder created successfully'];
        return response($response, 200);
    }
}
