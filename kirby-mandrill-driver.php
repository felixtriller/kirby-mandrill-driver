<?php

/**
 * Mandrill mail driver for Kirby CMS
 */
email::$services['mandrill'] = function ($email) {
    if (empty($email->options['key'])) {
        throw new Error('Missing Mandrill API key');
    }

    $url = 'https://mandrillapp.com/api/1.0/messages/send.json';

    // See https://mandrillapp.com/api/docs/messages.curl.html
    $message = array(
        'from_email' => $email->from,
        'to'         => is_array($email->to) ? $email->to : array(array('email' => $email->to)),
        'subject'    => $email->subject,
        'text'       => $email->body,
        'headers'    => array(
            'Reply-To' => $email->replyTo,
        ),
    );

    $data = array(
        'key'     => $email->options['key'],
        'message' => $message,
    );

    $email->response = remote::post($url, array(
        'data' => json_encode($data),
    ));

    if ($email->response->code() != 200) {
        throw new Error('The mail could not be sent!');
    }
};
