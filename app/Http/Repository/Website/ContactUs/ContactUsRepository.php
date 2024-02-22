<?php
namespace App\Http\Repository\Website\ContactUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    ContactUs
   

};


class ContactUsRepository{

		public function addAll($request)
{
    try {
      
        $contact = new ContactUs();
        $contact->full_name = $request['full_name'];
        $contact->contact_number = $request['contact_number'];
        $contact->whats_app_number = $request['whats_app_number'];
        $contact->education = $request['education'];
        $contact->save(); 

		return $contact->id;
      

    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}       


// public function addAll($requestData)
// {
//     try {
//         if (isset($requestData['transaction_id'])) {
//             // Second form submission with transaction ID
//             $contact = ContactUs::latest()->first();
//             if ($contact) {
//                 $contact->transaction_id = $requestData['transaction_id'];
//                 $contact->save();
//                 return $contact;
//             } else {
//                 // Handle scenario where there are no existing records
//                 return [
//                     'msg' => 'No existing contact record found.',
//                     'status' => 'error'
//                 ];
//             }
//         } else {
//             // First form submission with contact details
//             $contact = new ContactUs();
//             $contact->full_name = $requestData['full_name'];
//             $contact->contact_number = $requestData['contact_number'];
//             $contact->whats_app_number = $requestData['whats_app_number'];
//             $contact->education = $requestData['education'];
//             $contact->save();
//             return $contact;
//         }
//     } catch (\Exception $e) {
//         return [
//             'msg' => $e->getMessage(),
//             'status' => 'error'
//         ];
//     }
// }

    
}