<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

class RoutesController extends Controller
{




public function showAdminPage()
{

$title =__("pages.dashboard.page-title");
 return view('pages.admin.dashboard',compact('title'));
 }

public function showSiteParametersPage()
{
$title =__("pages.site-params.page-title");
 return view('pages.admin.site-parameters',compact('title'));
 }




public function showUsersPage()
{
$title =__("pages.users.page-title");
$modalData= [
             "title"=>"modals.user.for.add",
              "component"=>[
                           "name"=>'user.user-modal',
                            "parameters"=> ['userableId'=>'1','userableType'=>'admin']
                           ]
             ];

return view('pages.admin.users',compact('title','modalData'));
 }

 public function showUserPage()
 {
  $title =__("pages.user-space.page-title");
$modalData= [
             "title"=>"modals.patient.for.add",
              "component"=>[
                           "name"=>'medical-secretary.patient-modal',
                            "parameters"=> []
                           ]
             ];
 return view('pages.user.home',compact('title','modalData'));
 }
 public function showProfilePage()
 {
  $title =__("pages.profile.page-title");
 return view('pages.user.profile',compact('title'));
 }





public function showPatientPage($patientId)
{
$title =__("pages.patient.page-title");
$modalData1= [
             "title"=>"modals.medical-stay.for.add",
              "component"=>[
                           "name"=>'doctor.medical-stay-modal',
                            "parameters"=> ['patientId'=> $patientId]
              ],
                           "containsTinyMce"=>true
             ];
$modalData2= [
             "title"=>"modals.examen-radio.for.add",
             "component"=>[
                "name"=>'doctor.examen-radio-modal',
                 "parameters"=> ['patientId'=> $patientId]
             ],
             "containsTinyMce"=>true
             ];

return view('pages.user.patient',compact('title','modalData1','modalData2','patientId'));
 }
}

