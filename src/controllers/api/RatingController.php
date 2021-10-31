<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Models\Rating;
use App\Singletons\GetEntityManager;

class RatingController extends Controller
{
  public function handle(): string
  {
    $params = json_decode(file_get_contents('php://input'));
    $prodId = $params->prodId;
    $rating = $params->rating;
    $userId = $params->userId;

    $emInstance = GetEntityManager::getInstance();
    $em = $emInstance->useEntityManager();

    $user = $em->getRepository('App\Models\User')->find($userId);
    $product = $em->getRepository('App\Models\Product')->find($prodId);

    $userRatings = $user->getUserRatings();
    $relevantRating = $userRatings->filter(function($element) use ($product)
    {
      return $element->getProduct()->getId() === $product->getId();
    });

    if(!$relevantRating->isEmpty())
    {
      return json_encode(['message' => 'Already rated']);
    }

    $rating = new Rating($rating);
    $rating->setUser($user);
    $rating->setProduct($product);
    $em->persist($rating);
    $em->flush();

    return json_encode(['message' => 'Success']);
  }
}