<?php

namespace Nikolag\Core\Utils;

class Constants
{
    //Transaction info
    const TRANSACTION_NAMESPACE = 'Nikolag\Core\Models\Transaction';
    const TRANSACTION_IDENTIFIER = 'id';
    //Transaction statuses
    const TRANSACTION_STATUS_OPENED = 'PENDING';
    const TRANSACTION_STATUS_PASSED = 'PAID';
    const TRANSACTION_STATUS_FAILED = 'FAILED';
    //Customer info
    const CUSTOMER_NAMESPACE = 'Nikolag\Core\Models\Customer';
    const CUSTOMER_IDENTIFIER = 'id';
    //Product info
    const PRODUCT_NAMESPACE = 'Nikolag\Core\Models\Product';
    const PRODUCT_IDENTIFIER = 'id';
    //Discount info
    const DISCOUNT_NAMESPACE = 'Nikolag\Core\Models\Discount';
    const DISCOUNT_IDENTIFIER = 'id';
    //Tax info
    const TAX_NAMESPACE = 'Nikolag\Core\Models\Tax';
    const TAX_IDENTIFIER = 'id';
    //Tax types
    const TAX_ADDITIVE = 'ADDITIVE';
    const TAX_INCLUSIVE = 'INCLUSIVE';
}
