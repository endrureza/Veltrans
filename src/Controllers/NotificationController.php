<?php

/*
 * This file is part of the endru/velitrans package.
 *
 * (c) Endru Reza <lotusb13@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/endrureza/veltrans
 */

namespace Endru\Veltrans\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Endru\Veltrans\Exceptions\VeltransException;

class NotificationController
{
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Handle Midtrans Notification
     *
     * @param Request $request
     * example json body :
     *
     * "masked_card": "411111-1111",
     * "approval_code": "000000",
     * "bank": "mandiri",
     * "eci": "02",
     * "transaction_time": "2014-04-07 16:22:36",
     * "gross_amount": "2700",
     * "order_id": "2014040745",
     * "payment_type": "credit_card",
     * "signature_key": "c99bcb62543bb61d1b5df57f7a049be15426b74586dee8d85df6aa367ce2344256fc42ec713e7a609b711afeeacf2acce80dc2c2507bce6fd3b6b5f750de6930",
     * "status_code": "200",
     * "transaction_id": "826acc53-14e0-4ae7-95e2-845bf0311579",
     * "transaction_status": "capture",
     * "fraud_status": "accept",
     * "status_message": "Veritrans payment notification"
     *
     * @return void
     */
    public function handling(Request $request)
    {
        if (config('veltrans.notification_url') === '') {
            throw new VeltransException('Notification url cannot be empty');
        }

        $result = $this->client->request(
            'POST',
            config('veltrans.notification_url'),
            [
                'verify' => __DIR__. '/../../resources/data/cacert.pem',
                'json' => $request->all(),
            ]
        );
    }
}
