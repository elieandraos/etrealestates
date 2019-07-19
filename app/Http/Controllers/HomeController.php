<?php

namespace App\Http\Controllers;

use SEO;
use App\Models\Area;
use App\Models\Type;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Andraos\Filters\PropertyFilter;
use App\Http\Resources\PropertyResource;

class HomeController extends Controller
{
    /**
     * Show the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEO::setTitle('RG Real Estates');
        SEO::setDescription('RG Real Estates number one property finder.');
        SEO::opengraph()->setUrl('https://rgrealestate.me/');
        //SEO::opengraph()->addImage(['url' => 'https://avatars1.githubusercontent.com/u/11164074?s=400&amp;v=4']);

        $types = Type::orderBy('name', 'ASC')->pluck('name', 'id');
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id');
        $price_ranges = [
            '100000' => 'Up to 100,000 $',
            '250000' => 'Up to 250,000 $',
            '400000' => 'Up to 400,000 $',
            '1000000' => 'Up to 1,000,000 $',
        ];

        $listings = [
            'rent' => 'Rent',
            'sale' => 'Sale',
        ];

        return view('front.home.index', [
            'types' => $types, 
            'areas' => $areas,
            'price_ranges' => $price_ranges,
            'listings' => $listings 
        ]);
    }

    /**
     * Filter properties
     * 
     * @param Request $request 
     * @return type
     */
    public function fetch(Request $request)
    {
        $data = Property::with('area', 'type')
                            ->filter(new PropertyFilter( [
                                'area' => $request->get('area'),
                                'type' => $request->get('type'),
                                'listed_for' => $request->get('listed_for'),
                                'maxAmount'  => $request->get('maxAmount'),
                                'published' => true
                            ]))
                            ->orderBy('is_featured', 'DESC')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(6);

        return PropertyResource::collection($data);
    }

    /**
     * Show property
     * 
     * @param Request $request 
     * @param type $reference 
     * @return type
     */
    public function show(Request $request, $reference)
    {
        $property = Property::with(['area', 'type'])->where('reference', $reference)->first();
        if(!$property)
            abort('404');

        SEO::setTitle($property->title);
        SEO::setDescription($property->description);
        SEO::opengraph()->setUrl(route('home.show', $property->reference));
        SEO::opengraph()->addImage(['url' => 'https://avatars1.githubusercontent.com/u/11164074?s=400&amp;v=4']);

        $data = Property::related($property)->get();
        
        $medias = $property->getMedia('gallery');
        $mediaUrls = [];
        if($medias) {
            foreach($medias as $media) {
                $mediaUrls[] = url($media->getUrl());
            }
        }

        $relatedProperties  = PropertyResource::collection($data);
        
        return view('front.home.show', ['property' => $property, 'relatedProperties' => $relatedProperties, 'mediaUrls' => json_encode($mediaUrls)]);
    }
}
