<?php

declare(strict_types=1);

namespace App\Services;

// Request
use App\Http\Requests\ShortLinkRequest;
// Models
use App\Models\ShortLink; 
// Exception
use App\Exceptions\CustomModelNotFoundException;
// Others
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str; 

class ShortLinkService
{

  /**
   * Return actual url from database.
   *
   * @method getAcutalLink
   *
   * @param  Request $request
   * @return string
   */
  public function getAcutalLink(string $code): string
  {
    $ShortLink = ShortLink::where('code',$code);
    if (!$ShortLink->first()) {
      throw new CustomModelNotFoundException("No valid url found");
    }
    $ShortLink->increment('visted_count');
    return $ShortLink->first()->link;
  }

   /**
   * Fetch all short links.
   *
   * @method getAllshortLinks
   *
   * @return Collection
   */
  public function getAllshortLinks(): Collection
  {
    return ShortLink::latest()->get(); 
  }

    /**
   * Save short link.
   *
   * @method saveShortLink
   *
   * @return ShortLink
   */
  public function saveShortLink(ShortLinkRequest $request): ShortLink
  {
    //Strip tag to prevent xss attack
    $link=strip_tags($request->link);
    $shortLink = ShortLink::create(
        [
          'link' => trim($link),
          'visted_count' => 0,
          'code' => self::fetchUrlCode(),
        ]
      );
    return $shortLink; 
  }

  /**
   * Return url code.
   *
   * @method fetchUrlCode
   *
   * @return string
   */
  public function fetchUrlCode(): string
  {
    do{
      $code = Str::random(8);
      $alreadyExistCheck = ShortLink::where('code',$code)->exists();
      //if already exist repeat
    }while ($alreadyExistCheck);
    return $code;
  }
}
