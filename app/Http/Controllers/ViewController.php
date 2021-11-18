<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DiscoveryController;

class ViewController extends Controller
{
    public function EnvironmentsView()
    {
        $environments = DiscoveryController::EnvironmentsList()['environments'];
        return view('environments', compact('environments'));
    }

    public function EnvironmentView(Request $request)
    {
        $environment = DiscoveryController::EnvironmentStatus($request);
        return view('environment', compact('environment'));
    }

    public function ConfigurationsView(Request $request)
    {
        $environment = DiscoveryController::EnvironmentStatus($request);
        return view('configurations', compact('environment'));
    }

    public function CollectionsView(Request $request)
    {
        $environment = DiscoveryController::EnvironmentStatus($request);
        $collections = DiscoveryController::CollectionsList($request)['collections'];
        return view('collections', compact('environment', 'collections'));
    }

    public function CollectionView(Request $request)
    {
        $environment = DiscoveryController::EnvironmentStatus($request);
        $collection = DiscoveryController::CollectionDetails($request);
        return view('collection', compact('environment', 'collection'));
    }

    public function DocumentsView(Request $request)
    {
        $environment = DiscoveryController::EnvironmentStatus($request);
        $collection = DiscoveryController::CollectionDetails($request);
        return view('documents', compact('environment', 'collection'));
    }

    public function QueriesView(Request $request)
    {
        $environment = DiscoveryController::EnvironmentStatus($request);
        $collection = DiscoveryController::CollectionDetails($request);
        return view('queries', compact('environment', 'collection'));
    }
}
