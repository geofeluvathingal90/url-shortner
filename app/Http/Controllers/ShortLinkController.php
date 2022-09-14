<?php

declare(strict_types=1);

namespace App\Http\Controllers;

// Request
use App\Http\Requests\ShortLinkRequest;
// Controllers
use Illuminate\Routing\Controller as BaseController;
// Exception
use App\Exceptions\CommonServerException;
//Services
use App\Services\ShortLinkService;
//view
use Illuminate\View\View;

class ShortLinkController extends BaseController
{
    /**
   * The ShortLinkService implementation.
   *
   * @var ShortLinkService
   */
    private ShortLinkService $service;

    /**
   * Constructor call to assign ShortLink service.
   *
   * @method __construct
   *
   * @param ShortLinkService $service
   */
    public function __construct(ShortLinkService $service)
    {
        $this->service = $service;
    }

    /**
     * To Check if short url exist and redirect.
     *
     * @method index
     *
     * @param  string $key
     */
    public function index(string $key)
    {
        //Get Acual Link from code
        $url = $this->service->getAcutalLink($key);
        return redirect($url);
    }

    /**
     * To List all short links.
     *
     * @method list
     *
     * @param  string $key
     * @return View
     */
    public function list(): view
    {
        //List all links
        $shortLinks = $this->service->getAllshortLinks();
        return view('short_link', compact('shortLinks'));
    }
    /**
     * It is used to show the resource list.
     *
      * @param  ShortLinkRequest
     */
    public function save(ShortLinkRequest $request)
    {
        try {
            //Save new link and generate short link
            $this->service->saveshortLink($request);
            return redirect()->route('shorten.link.list')
             ->with('success', 'Shorten Link Generated Successfully!');
        } catch (CommonServerException $e) {
            // Throws error exception
            return $e->render();
        }
    }
}
