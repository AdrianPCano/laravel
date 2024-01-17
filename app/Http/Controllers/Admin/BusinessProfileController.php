<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\BusinessProfile;
use App\Http\Requests\Admin\BusinessProfileRequest;
use Debugbar;

class BusinessProfileController extends Controller
{
  public function __construct(private BusinessProfile $businessProfile){}
  
  public function index()
  {
    try{

      $businessProfiles = $this->businessProfile
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.businessProfiles.index')
      ->with('businessProfile', $this->businessProfile)
      ->with('businessProfiles', $businessProfiles);

      if(request()->ajax()) {
          
        $sections = $view->renderSections(); 

        return response()->json([
            'table' => $sections['table'],
            'form' => $sections['form'],
        ], 200); 
      }

      return $view;
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function create()
  {
    try {

      $view = View::make('admin.businessProfiles.index')
        ->with('businessProfile', $this->businessProfile)
        ->renderSections();

      return response()->json([
          'form' => $view['form']
      ], 200);

    } catch (\Exception $e) {
      return response()->json([
          'message' =>  \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function store(BusinessProfileRequest $request)
  {            
    try{

      $data = $request->validated();
  
      $this->businessProfile->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      $businessProfiles = $this->businessProfile
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }

      $view = View::make('admin.businessProfiles.index')
        ->with('businessProfiles', $businessProfiles)
        ->with('businessProfile', $this->businessProfile)
        ->renderSections();        

      return response()->json([
        'table' => $view['table'],
        'form' => $view['form'],
        'message' => $message
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => $e->getMessage(),
      ], 500);
    }
  }

  public function edit(BusinessProfile $businessProfile)
  {
    try{

      $view = View::make('admin.businessProfiles.index')
      ->with('businessProfile', $businessProfile); 

      if(request()->ajax()) {

          $sections = $view->renderSections(); 
  
          return response()->json([
              'form' => $sections['form'],
          ], 200);
      }
              
      return $view;
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function destroy(BusinessProfile $businessProfile)
  {
    try{
      $businessProfile->delete();

      $businessProfiles = $this->businessProfile
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      $view = View::make('admin.businessProfiles.index')
        ->with('businessProfile', $this->businessProfile)
        ->with('businessProfiles', $businessProfiles)
        ->renderSections();
      
      return response()->json([
          'table' => $view['table'],
          'form' => $view['form'],
          'message' => $message
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }
}