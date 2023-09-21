<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletters implements Newsletters
{
  public function __construct(protected ApiClient $client ) {}

  public function Subscribe(string $email, $list = null)
  {
    $list ??= config('services.mailchimp.lists.Subscribers');

    $this->client->lists->addListMember($list, [
      "email_address" => $email,
      "status" => "subscribed",
    ]);
  }
}
