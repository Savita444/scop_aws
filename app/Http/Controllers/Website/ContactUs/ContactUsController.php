<?php

namespace App\Http\Controllers\Website\ContactUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use Illuminate\Http\Request;
use App\Http\Services\Website\ContactUs\ContactUsServices;
use Session;
use Validator;
use App\Models\ {
    ContactUs
   

};
class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->service = new ContactUsServices();
    }
    public function getContactUs()
    {
        try {
            $data = '';
            return view('website.pages.index',compact('data'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function secondform($add_contact) {
        try {
            return view('website.pages.transaction',compact('add_contact'));
        } catch (\Exception $e) {
            return $e;
        }
    }
        public function addContactUs(Request $request){
            
        $rules = [
            'full_name' => 'required',
            'contact_number' => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
            'whats_app_number' => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
            'education' => 'required',
            'g-recaptcha-response' => 'required|captcha',
            ];
        $messages = [   
            'full_name.required' => 'Please Enter Full Name.',
            'contact_number.required' => 'Please Enter Contact Number.',
            'contact_number.regex' => 'Please Enter a Valid Contact Number.',
            'whats_app_number.required' => 'Please Enter Whats App Number.',
            'whats_app_number.regex' => 'Please Enter a Valid Whats App Number.',
            'education.required' => 'Please Enter Education.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
        ];
    
        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_contact = $this->service->addAll($request);
    
                if($add_contact)
                {
    
                    if($add_contact !='') {
                        // Session::flash('success_message', 'Contact Us submitted successfully!');
                        // return redirect('/')->with(compact('msg','status'));
                        return redirect()->route('secondform',$add_contact);
                    }
                    else {
                        return redirect('/')->withInput()->with(compact('language','menu','msg','status'));
    
                    }
                }
    
            }
        } catch (Exception $e) {
            return redirect('/')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    private function redirectToNext($data) {

        try {
         
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function updatesecondSecondForm(Request $request)
{
    $rules = [
        'transaction_id' => 'required',
    ];

    $messages = [
        'transaction_id.required' => 'Please enter transaction number.',
    ];

    try {
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput();
        }

        $updated = ContactUs::where('id', $request->user_id)->update([
            'transaction_id' => $request->input('transaction_id'),
        ]);

        if ($updated) {
            $msg = 'Contact Us Information submitted successfully!';
            $status = 'success';
        } else {
            $msg = 'Failed to add Contact Us Information submitted';
            $status = 'error';
        }
        
        // Session::flash('success_message', 'Contact Us submitted successfully!');
        $request->session()->flash('success', 'Your registration for the bootcamp successfully!!');
        return redirect('/')
            ->with(compact('msg', 'status'));

    } catch (Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}

//     public function updatesecondSecondForm(Request $request)
// {
//     $rules = [
//         'transaction_id' => 'required',
//     ];

//     $messages = [
//         'transaction_id.required' => 'Please enter transaction number.',
//     ];

//     try {
//         $project_data = ContactUs::where('id', $request->user_id)->update([
//             'transaction_id' => $request->input('transaction_id'),
//         ]);

//         $msg = 'Information saved successfully';
//         $status = 'success';
//         return redirect('/')->with(compact('msg', 'status'));
//     } catch (Exception $e) {
//         return redirect()->back()
//             ->withInput()
//             ->with(['msg' => $e->getMessage(), 'status' => 'error']);
//     }
// }

}
