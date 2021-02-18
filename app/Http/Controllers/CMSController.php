<?php

namespace App\Http\Controllers;

// Home
use App\Models\About;
use App\Models\Gallery;
use App\Models\Info;
use App\Models\Service;
use App\Models\Header;
use App\Models\Youtube;
use App\Models\Contact;

// Product (Type Unit)
use App\Models\Unit;

// Facilities
use App\Models\Facilities;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use File;

class CMSController extends Controller
{
    // CONTACT
    public function contact()
    {

        $contact = Contact::all();
        return view('dashboard.pages.cms.contact.index', compact('contact'));

    }

    public function createContact()
    {
        if(Auth::check()) {
            if(auth()->user()->role_id == 1) {
                return view('dashboard.pages.cms.contact.create');
            }else{
                return redirect('user')->with('error',"Sorry, can't access this page!");
            }
        }
    }

    public function storeContact(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $contact = Contact::create([
            'title' => $request->title,
            'description' => $request->description,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('contact.index')->with('success', 'Contact berhasil ditambahkan');
    }
    public function editContact($id)
    {
        $contact = Contact::findorfail($id);

        return view('dashboard.pages.cms.contact.edit', compact('contact'));
    }
    public function updateContact(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $contact = Contact::findorfail($id);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        $contact->update($data);
        return redirect()->route('contact.index')->with('success', 'Contact berhasil diupdate');
    }
    public function destroyContact($id)
    {
        $contact = Contact::findorfail($id);

        $contact->delete();

        return redirect()->back()->with('success', 'Contact berhasil dihapus');
    }

    // HEADER
    public function header()
    {

        $header = Header::all();
        return view('dashboard.pages.cms.header.index', compact('header'));

    }

    public function createHeader(Request $request)
    {
        if(Auth::check()) {
            if(auth()->user()->role_id == 1) {
                return view('dashboard.pages.cms.header.create');
            }else{
                return redirect('user')->with('error',"Sorry, can't access this page!");
            }
        }
    }

    public function storeHeader(Request $request)
    {
        $this->validate($request, [
            'main_title' => 'required',
            'second_title' => 'required',
        ]);

        $header = Header::create([
            'main_title' => $request->main_title,
            'second_title' => $request->second_title,
        ]);

        return redirect()->route('header.index')->with('success', 'Header berhasil ditambahkan');
    }
    public function editHeader($id)
    {
        $header = Header::findorfail($id);

        return view('dashboard.pages.cms.header.edit', compact('header'));
    }
    public function updateHeader(Request $request, $id)
    {
        $this->validate($request, [
            'main_title' => 'required',
            'second_title' => 'required',
        ]);

        $header = Header::findorfail($id);

        $data = [
            'main_title' => $request->main_title,
            'second_title' => $request->second_title,
        ];

        $header->update($data);

        return redirect()->route('header.index')->with('success', 'Header berhasil diupdate');
    }
    public function destroyHeader($id)
    {
        $header = Header::findorfail($id);

        $header->delete();

        return redirect()->back()->with('success', 'Header berhasil dihapus');
    }

    // SERVICES
    public function Service()
    {

        $service = Service::all();
        return view('dashboard.pages.cms.service.index', compact('service'));

    }

    public function createService()
    {
        if(Auth::check()) {
            if(auth()->user()->role_id == 1) {
                return view('dashboard.pages.cms.service.create');
            }else{
                return redirect('user')->with('error',"Sorry, can't access this page!");
            }
        }
    }

    public function storeService(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $gambar = $request->image;
        $new_gambar = time().$gambar->getClientOriginalName();

        $service = Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'public/uploads/posts/'.$new_gambar,
        ]);

        $gambar->move('public/uploads/posts/', $new_gambar);

        return redirect()->back()->with('success', 'Service berhasil ditambahkan');
    }
    public function editService($id)
    {
        $service = Service::findorfail($id);

        return view('dashboard.pages.cms.service.edit', compact('service'));
    }
    public function updateService(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $service = Service::findorfail($id);
        if($request->has('image')) {
            $gambar = $request->image;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $new_gambar);

            $service_data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'public/uploads/posts/'.$new_gambar,
            ];
        } else  {
            $service_data = [
                'title' => $request->title,
                'description' => $request->description,
            ];
        }

        $service->update($service_data);
        return redirect()->route('service.index')->with('success', 'Service berhasil diupdate');
    }
    public function destroyService($id)
    {
        $service = Service::findorfail($id);

        $service->delete();

        return redirect()->back()->with('success', 'Service berhasil dihapus');
    }

    // ABOUT
    public function About()
    {

        $about = About::all();
        return view('dashboard.pages.cms.about.index', compact('about'));

    }

    public function createAbout()
    {
        if(Auth::check()) {
            if(auth()->user()->role_id == 1) {
                return view('dashboard.pages.cms.about.create');
            }else{
                return redirect('user')->with('error',"Sorry, can't access this page!");
            }
        }
    }

    public function storeAbout(Request $request)
    {
        $detail = $request->description;

        $dom = new \domdocument();
		$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOERROR | LIBXML_NOWARNING);
		$images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= 'public/uploads/about/'.str_slug($request->title).'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', $image_name);
        }

        $gambar = $request->image;
        $new_gambar = time().$gambar->getClientOriginalName();
        
        $detail = $dom->savehtml();
        $about = new About;
        $about->image        = 'public/uploads/posts/'.$new_gambar;
        $about->description  = $detail;
        $about->save();

        $gambar->move('public/uploads/posts/', $new_gambar);

        return redirect('cms/about')->with('add','Add About Successfully');
    }
    public function editAbout($id)
    {
        $about = About::findorfail($id);

        return view('dashboard.pages.cms.about.edit', compact('about'));
    }
    public function updateAbout(Request $request, $id)
    {
        $detail = $request->description;

		$dom = new \domdocument();
		$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOERROR | LIBXML_NOWARNING);
		$images = $dom->getelementsbytagname('img');
        if($request->has($images))
        {
            foreach($images as $k => $img){
                $data = $img->getattribute('src');

                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);

                $data = base64_decode($data);
                $image_name= 'public/uploads/about/'.str_slug($request->title).'.png';
                $path = public_path() . $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', $image_name);
            }
        }

        $gambar = $request->image;
        $new_gambar = time().$gambar->getClientOriginalName();

        $detail = $dom->savehtml();
        $about = About::find($id);
        $about->image        = $request->image ? 'public/uploads/posts/'.$new_gambar : $about->image;
        $about->description  = $detail;
        $about->save();

        $gambar->move('public/uploads/posts/', $new_gambar);

        return redirect('cms/about')->with('add','Update Data Successfully');
    }
    public function destroyAbout($id)
    {
        $about = About::findorfail($id);

        $about->delete();

        return redirect()->back()->with('success', 'About berhasil dihapus');
    }

    // INFO
    public function Info()
    {

        $info = Info::all();
        return view('dashboard.pages.cms.info.index', compact('info'));

    }

    public function createInfo()
    {
        return view('dashboard.pages.cms.info.create');
    }

    public function storeInfo(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $gambar = $request->image;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Info::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'public/uploads/posts/'.$new_gambar,
        ]);

        $gambar->move('public/uploads/posts/', $new_gambar);

        return redirect('cms/info')->with('success', 'Info berhasil ditambahkan');
    }
    public function editInfo($id)
    {
        $info = Info::findorfail($id);

        return view('dashboard.pages.cms.info.edit', compact('info'));
    }
    public function updateInfo(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $news = Info::findorfail($id);
        if($request->has('image')) {
            $gambar = $request->image;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $new_gambar);

            $news_data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'public/uploads/posts/'.$new_gambar,
            ];
        } else  {
            $news_data = [
                'title' => $request->title,
                'description' => $request->description,
            ];
        }

        $news->update($news_data);
        return redirect()->route('info.index')->with('success', 'Post berhasil diupdate');
    }
    public function destroyInfo($id)
    {
        $info = Info::findorfail($id);

        $info->delete();

        return redirect()->back()->with('success', 'Info berhasil dihapus');
    }

    // PRODUCT/UNIT
    public function Unit()
    {

        $unit = Unit::all();
        return view('dashboard.pages.cms.unit.index', compact('unit'));

    }

    public function createUnit()
    {
        return view('dashboard.pages.cms.unit.create');
    }

    public function storeUnit()
    {
        // 
    }
    public function editUnit()
    {
        // 
    }
    public function updateUnit()
    {
        // 
    }
    public function destroyUnit()
    {
        // 
    }

    // FASILITIES
    public function Facilities()
    {

        $facilities = Facilities::all();
        return view('dashboard.pages.cms.facilities.index', compact('facilities'));

    }

    public function createFacilities()
    {
        return view('dashboard.pages.cms.facilities.create');
    }

    public function storeFacilities(Request $request)
    {
        $facilities_id = Facilities::createID();
        $facilities = new Facilities;

        $gambar = $request->image;
        $new_gambar = time().$gambar->getClientOriginalName();
        
        $facilities->id = $facilities_id;
        $facilities->title = $request->title;
        $facilities->image = 'public/uploads/facilities/'.$new_gambar;
        $facilities->description = $request->description;
        $facilities->save();

        $gambar->move('public/uploads/facilities/', $new_gambar);

        // ADD TO GALLERY IMAGE
        $gallery_id             = Gallery::createID();
        $gallery                = new Gallery;
        $gallery->id            = $gallery_id;
        $gallery->facilities_id = $facilities_id;
        $gallery->title         = $request->title;
        $gallery->image         = 'public/uploads/facilities/'.$new_gambar;
        $gallery->category      = $request->category;
        $gallery->save();

        return redirect('cms/facilities')->with('add','Create Service Successfully');
    }
    public function editFacilities($id)
    {
        $facilities = Facilities::findorfail($id);

        return view('dashboard.pages.cms.facilities.edit', compact('facilities'));
    }
    public function updateFacilities(Request $request, $id)
    {
        $facilities = Facilities::findorfail($id);

        if($request->has('image')) {
            // unlink($facilities->image);

            $gambar = $request->image;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/facilities/', $new_gambar);
            
            $facilities_data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'public/uploads/facilities/'. $new_gambar,
            ];

        } else  {
            $facilities_data = [
                'title' => $request->title,
                'description' => $request->description,
            ];
        }

        $facilities->update($facilities_data);

        return redirect('cms/facilities')->with('success','Update facilities Successfully');
    }

    public function destroyFacilities($id)
    {
		$facilities = Facilities::where('id',$id)->first();
		$gallery = Gallery::where('facilities_id',$id)->first();

		File::delete($facilities->image);
		File::delete($gallery->image);

        Facilities::where('id',$id)->delete();
        Gallery::where('facilities_id',$id)->delete();

        return redirect('cms/facilities')->with('delete','Delete Data Successfully');
    }

    // Gallery
    public function Gallery()
    {

        $gallery = Gallery::all();
        return view('dashboard.pages.cms.gallery.index', compact('gallery'));

    }

    public function createGallery()
    {
        // 
    }

    public function storeGallery()
    {
        // 
    }
    public function editGallery()
    {
        // 
    }
    public function updateGallery()
    {
        // 
    }
    public function destroyGallery()
    {
        // 
    }
}
