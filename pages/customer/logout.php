<?php

unset($_SESSION['customer']);

unset($_SESSION['cart']);

header("Location: ?page=customer");