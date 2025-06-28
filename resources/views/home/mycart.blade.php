<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
   @include('home.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- Mobile-specific viewport settings -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <!-- Mobile cart optimizations -->
    <link rel="stylesheet" href="{{ asset('css/mobile-cart.css') }}">
    
    <!-- Mobile-specific styles -->
    <style>
        /* Mobile responsive styles for cart page */
        .checkout-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            width: 98% !important;
            max-width: 98% !important;
            margin: 1rem auto;
            padding: 0 0.5rem;
        }
        
        /* Full width container for mobile */
        @media (max-width: 767px) {
            .checkout-container {
                width: 98% !important;
                padding: 0 0.25rem;
            }
            
            .hero_area {
                padding: 0 !important;
                width: 100% !important;
            }
            
            .container {
                width: 100% !important;
                max-width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }
        }
        
        /* Extra small screens */
        @media (max-width: 430px) {
            .checkout-container {
                width: 98% !important;
                padding: 0 0.25rem;
                margin: 0.5rem auto;
            }
            
            .checkout-card {
                padding: 0.75rem;
            }
        }
        
        .checkout-card {
            background: #fff;
            border-radius: 16px;
            padding: 1.2rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            background: linear-gradient(145deg, #2b3035, #1a1e22);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .checkout-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            padding-bottom: 0.6rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            color: white;
            position: relative;
        }
        
        .checkout-title:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 80px;
            height: 2px;
            background: #f05454;
        }
        
        /* Form styling */
        .form-group {
            margin-bottom: 1rem;
            position: relative;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 500;
            color: white;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }
        
        .form-control {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .form-control:focus {
            border-color: #f05454;
            box-shadow: 0 0 0 3px rgba(240, 84, 84, 0.2);
            outline: none;
        }
        
        /* Phone input styling */
        .phone-input-group {
            display: flex;
            align-items: center;
        }
        
        .phone-prefix {
            padding: 0.9rem 1rem;
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-right: none;
            border-radius: 10px 0 0 10px;
            font-weight: 500;
            color: #333;
        }
        
        .phone-input {
            border-radius: 0 10px 10px 0;
            flex: 1;
        }
        
        /* Delivery options styling */
        .delivery-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1rem;
            margin-top: 0.5rem;
        }
            
        .delivery-option {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .delivery-option:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        
        .delivery-option input[type="radio"] {
            margin-right: 0.8rem;
            width: 18px;
            height: 18px;
            accent-color: #f05454;
        }
        
        .delivery-option span {
            color: white;
            font-weight: 500;
            font-size: 0.95rem;
        }
        
        /* Textarea styling */
        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }
        
        /* Note text styling */
        .note-text {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.95rem;
            color: #f0c05a !important;
            font-weight: 500;
            padding: 0.8rem;
            background-color: rgba(240, 192, 90, 0.1);
            border-radius: 8px;
            border: 1px solid rgba(240, 192, 90, 0.2);
        }
        
        /* Cart items container - Dynamic height */
        .cart-items-container {
            width: 100%;
            transition: all 0.3s ease;
        }
        
        /* Cart item row animations */
        .cart-item-row {
            transition: all 0.3s ease;
            opacity: 1;
            transform: translateX(0);
        }
        
        /* Animation for new items */
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .cart-item-row.new-item {
            animation: fadeInRight 0.4s ease forwards;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .checkout-container {
                grid-template-columns: 1fr;
                max-width: 700px;
            }
            
            .checkout-card {
                margin-bottom: 1.5rem;
            }
        }
        
                    @media (max-width: 767px) {
                .checkout-container {
                    grid-template-columns: 1fr;
                    padding: 0 1rem;
                    margin: 1.2rem auto;
                    gap: 1rem;
                }
                
                .checkout-card {
                    padding: 1rem;
                    margin-bottom: 1rem;
                    border-radius: 14px;
                }
                
                .checkout-title {
                    font-size: 1.3rem;
                    margin-bottom: 1rem;
                    padding-bottom: 0.5rem;
                }
                
                .form-group {
                    margin-bottom: 0.9rem;
                }
                
                .form-label {
                    margin-bottom: 0.3rem;
                    font-size: 0.9rem;
                }
            
                            .form-control {
                    padding: 0.6rem 0.8rem;
                    font-size: 0.9rem;
                    border-radius: 7px;
                }
            
            .phone-prefix {
                padding: 0.8rem 1rem;
                border-radius: 8px 0 0 8px;
            }
            
            .delivery-options {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                gap: 0.8rem;
            }
            
            .delivery-option {
                padding: 0.8rem;
                border-radius: 8px;
            }
            
            .delivery-option input[type="radio"] {
                margin-right: 0.6rem;
                width: 16px;
                height: 16px;
            }
            
            .delivery-option span {
                font-size: 0.9rem;
            }
            
            textarea.form-control {
                min-height: 70px;
            }
        }
        
        /* Improve cart item display on small screens */
                    @media (max-width: 576px) {
                .checkout-container {
                    padding: 0 0.8rem;
                    margin: 1rem auto;
                    gap: 0.8rem;
                }
                
                .checkout-card {
                    padding: 0.9rem;
                    border-radius: 12px;
                }
                
                .checkout-title {
                    font-size: 1.2rem;
                    margin-bottom: 0.9rem;
                }
                
                .form-group {
                    margin-bottom: 0.8rem;
                }
            
            .delivery-options {
                grid-template-columns: 1fr;
                gap: 0.6rem;
            }
            
            .delivery-option {
                padding: 0.7rem;
            }
            
            .delivery-option input[type="radio"] {
                width: 15px;
                height: 15px;
            }
            
            .cart-items thead {
                display: none;
            }
            
            .cart-items, .cart-items tbody, .cart-items tr {
                display: block;
                width: 100%;
            }
            
            .cart-items tr {
                margin-bottom: 1rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                position: relative;
            }
            
            .cart-items td {
                display: block;
                text-align: right;
                padding: 0.4rem 0;
                border: none;
            }
            
            .cart-items td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                color: white;
            }
            
            .cart-items td:last-child {
                position: absolute;
                top: 0;
                right: 0;
                border: none;
            }
        }
        
        /* Very small screens */
        @media (max-width: 430px) {
            .checkout-container {
                padding: 0 0.5rem;
                margin: 0.8rem auto;
            }
            
            .checkout-card {
                padding: 0.8rem;
                border-radius: 10px;
            }
            
            .checkout-title {
                font-size: 1.1rem;
                margin-bottom: 0.8rem;
                padding-bottom: 0.4rem;
            }
            
            .form-label {
                font-size: 0.85rem;
                margin-bottom: 0.25rem;
            }
            
            .form-control {
                padding: 0.5rem 0.7rem;
                font-size: 0.85rem;
                border-radius: 6px;
            }
            
            .phone-prefix {
                padding: 0.7rem 0.9rem;
                border-radius: 7px 0 0 7px;
                font-size: 0.9rem;
            }
            
            .delivery-option {
                padding: 0.6rem;
            }
            
            .delivery-option span {
                font-size: 0.85rem;
            }
            
            textarea.form-control {
                min-height: 60px;
            }
            
            .note-text {
                font-size: 0.85rem;
                padding: 0.6rem;
                margin-top: 1rem;
            }
        }

        /* Payment method styling */
        .payment-options {
            margin-top: 0.3rem;
        }

        .payment-option {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .payment-option:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .payment-option input[type="radio"] {
            margin-right: 0.8rem;
            width: 18px;
            height: 18px;
            accent-color: #f05454;
        }

        .payment-label {
            display: flex;
            align-items: center;
            color: white;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .payment-label i {
            color: #f0c05a;
            font-size: 1.1rem;
            margin-right: 0.8rem;
        }

        /* Promo code styling */
        .promo-code {
            display: flex;
            gap: 0.6rem;
            margin: 1rem 0;
        }

        .promo-input {
            flex: 1;
            padding: 0.9rem 1.2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.95);
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .promo-input:focus {
            border-color: #f05454;
            box-shadow: 0 0 0 3px rgba(240, 84, 84, 0.2);
            outline: none;
        }

        .btn-apply {
            background: #f05454;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0 1.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-apply:hover {
            background-color: #d93b3b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(240, 84, 84, 0.25);
        }

        /* Order summary styling */
        .summary-details {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.6rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .total-row {
            font-weight: 600;
            font-size: 1.1rem;
            padding-top: 0.7rem;
            margin-top: 0.3rem;
            color: white;
        }

        .total-row span:last-child {
            color: #f05454;
            font-size: 1.2rem;
        }

        /* Confirm button styling */
        .btn-confirm {
            width: 100%;
            padding: 0.9rem;
            background: #f05454;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .btn-confirm:hover {
            background-color: #d93b3b;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(240, 84, 84, 0.25);
        }

        .btn-confirm.loading {
            pointer-events: none;
            background-color: #d93b3b;
        }

        .btn-confirm.loading::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            border: 3px solid transparent;
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .secure-checkout {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .secure-checkout i {
            color: #28a745;
        }

        /* Responsive adjustments for payment and summary */
        @media (max-width: 767px) {
            .payment-option {
                padding: 0.8rem;
                border-radius: 8px;
            }
            
            .payment-label {
                font-size: 0.9rem;
            }
            
            .payment-label i {
                font-size: 1rem;
                margin-right: 0.6rem;
            }
            
            .promo-code {
                gap: 0.6rem;
                margin: 1.2rem 0;
            }
            
            .promo-input {
                padding: 0.8rem 1rem;
                border-radius: 8px;
            }
            
            .btn-apply {
                border-radius: 8px;
                padding: 0 1.2rem;
            }
            
            .summary-details {
                padding: 1rem;
                border-radius: 8px;
            }
            
            .summary-row {
                padding: 0.7rem 0;
            }
            
            .total-row {
                font-size: 1rem;
            }
            
            .total-row span:last-child {
                font-size: 1.1rem;
            }
            
            .btn-confirm {
                padding: 1rem;
                font-size: 1rem;
                border-radius: 8px;
            }
        }

        @media (max-width: 430px) {
            .payment-option {
                padding: 0.7rem;
                border-radius: 7px;
            }
            
            .payment-label {
                font-size: 0.85rem;
            }
            
            .payment-label i {
                font-size: 0.9rem;
                margin-right: 0.5rem;
            }
            
            .promo-code {
                gap: 0.5rem;
                margin: 1rem 0;
            }
            
            .promo-input {
                padding: 0.7rem 0.9rem;
                border-radius: 7px;
                font-size: 0.9rem;
            }
            
            .btn-apply {
                border-radius: 7px;
                padding: 0 1rem;
                font-size: 0.9rem;
            }
            
            .summary-details {
                padding: 0.8rem;
                border-radius: 7px;
                margin-bottom: 1.2rem;
            }
            
            .summary-row {
                padding: 0.6rem 0;
                font-size: 0.9rem;
            }
            
            .total-row {
                font-size: 0.95rem;
            }
            
            .total-row span:last-child {
                font-size: 1.05rem;
            }
            
            .btn-confirm {
                padding: 0.9rem;
                font-size: 0.95rem;
                border-radius: 7px;
            }
            
            .secure-checkout {
                font-size: 0.8rem;
            }
        }

        /* Cart items styling */
        .order-card {
            background: linear-gradient(145deg, #2b3035, #1a1e22);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .item-count {
            background-color: rgba(240, 84, 84, 0.1);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .cart-items {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-items th {
            text-align: left;
            padding: 0.8rem;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-weight: 500;
        }

        .cart-items td {
            padding: 1rem 0.8rem;
            vertical-align: middle;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }

        .cart-item-row:last-child td {
            border-bottom: none;
        }

        .product-info-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .product-image-wrapper {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background-color: rgba(255, 255, 255, 0.05);
        }

        .cart-item-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .product-title {
            font-weight: 500;
            color: white;
            font-size: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price-mobile {
            display: none;
            font-weight: 500;
            color: #f05454;
            font-size: 0.9rem;
        }

        .controls {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-box {
            display: flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 6px;
            padding: 0.3rem 0.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .quantity-box button {
            width: 28px;
            height: 28px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-box button:hover {
            background-color: rgba(240, 84, 84, 0.2);
        }

        .quantity-box button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .quantity-number {
            margin: 0 0.8rem;
            font-weight: 500;
            font-size: 1rem;
        }

        .stock-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 0.5rem;
        }

        .stock-info i {
            color: #28a745;
            font-size: 0.9rem;
        }

        .total-price {
            font-weight: 600;
            color: #f05454;
        }

        .btn-remove {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #f05454;
            transition: all 0.3s ease;
        }

        .btn-remove:hover {
            background-color: rgba(240, 84, 84, 0.1);
            transform: scale(1.1);
        }

        .empty-cart {
            text-align: center;
            padding: 2rem 1rem;
            color: white;
        }

        .empty-cart i {
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.3);
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        .empty-cart p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .continue-shopping {
            display: inline-block;
            background-color: #f05454;
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .continue-shopping:hover {
            background-color: #d93b3b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(240, 84, 84, 0.25);
        }

        /* Mobile cart styles */
        @media (max-width: 767px) {
            .order-header {
                margin-bottom: 1.2rem;
            }
            
            .item-count {
                padding: 0.3rem 0.7rem;
                font-size: 0.85rem;
            }
            
            .cart-items th {
                padding: 0.7rem;
                font-size: 0.9rem;
            }
            
            .cart-items td {
                padding: 0.8rem 0.7rem;
            }
            
            .product-image-wrapper {
                width: 60px;
                height: 60px;
                border-radius: 6px;
            }
            
            .product-title {
                font-size: 0.95rem;
            }
            
            .quantity-box {
                padding: 0.2rem 0.4rem;
            }
            
            .quantity-box button {
                width: 26px;
                height: 26px;
                font-size: 0.9rem;
            }
            
            .quantity-number {
                margin: 0 0.6rem;
                font-size: 0.95rem;
            }
            
            .stock-info {
                font-size: 0.75rem;
            }
            
            .btn-remove {
                width: 32px;
                height: 32px;
            }
            
            .empty-cart i {
                font-size: 2.5rem;
            }
            
            .empty-cart p {
                font-size: 1.1rem;
            }
            
            .continue-shopping {
                padding: 0.7rem 1.3rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 576px) {
            .product-info-container {
                flex-direction: row;
                gap: 0.8rem;
            }
            
            .product-image-wrapper {
                width: 55px;
                height: 55px;
            }
            
            .product-title {
                font-size: 0.9rem;
                -webkit-line-clamp: 1;
            }
            
            .product-price-mobile {
                display: block;
            }
            
            .quantity-box {
                margin: 0 auto;
            }
            
            .cart-items td[data-label="Price"] {
                display: none;
            }
            
            .btn-remove {
                width: 30px;
                height: 30px;
            }
        }

        @media (max-width: 430px) {
            .product-image-wrapper {
                width: 50px;
                height: 50px;
            }
            
            .product-title {
                font-size: 0.85rem;
            }
            
            .quantity-box button {
                width: 24px;
                height: 24px;
                font-size: 0.85rem;
            }
            
            .quantity-number {
                margin: 0 0.5rem;
                font-size: 0.9rem;
            }
            
            .stock-info {
                font-size: 0.7rem;
            }
            
            .btn-remove {
                width: 28px;
                height: 28px;
            }
            
            .empty-cart i {
                font-size: 2rem;
            }
            
            .empty-cart p {
                font-size: 1rem;
            }
            
            .continue-shopping {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body style="background-color: #000000 !important; color: #ffffff !important;">
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

    <!-- end header section -->

    <div class="checkout-container">
        <!-- Customer Information Section -->
        <div>
            <div class="checkout-card">
                <h2 class="checkout-title">Your Details</h2>
                <form action="{{ url('confirm_order') }}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        @if(!Auth::user())
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                        @else
                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="phone-input-group">
                            <span class="phone-prefix">+880</span>
                            @if(!Auth::user())
                                <input type="text" id="phone" name="phone" class="form-control phone-input" placeholder="Enter your phone number" required>
                            @else
                                <input type="text" id="phone" name="phone" class="form-control phone-input" value="{{ Auth::user()->phone }}" required>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address (Optional)</label>
                        @if(!Auth::user())
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                        @else
                            <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="address" class="form-label">Delivery Address</label>
                        @if(!Auth::user())
                            <input type="text" id="address" name="address" class="form-control" placeholder="House no, thana, street, direction etc" required>
                        @else
                            <input type="text" id="address" name="address" class="form-control" value="{{ Auth::user()->address }}" required>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Delivery Zone</label>
                        <div class="delivery-options">
                            <label class="delivery-option">
                                <input type="radio" name="delivery_zone" value="dhaka" required>
                                <span>Inside Dhaka</span>
                            </label>
                            <label class="delivery-option">
                                <input type="radio" name="delivery_zone" value="suburban" required>
                                <span>Sub-Urban</span>
                            </label>
                            <label class="delivery-option">
                                <input type="radio" name="delivery_zone" value="outside_dhaka" required>
                                <span>Outside Dhaka</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="note" class="form-label">Delivery Instructions (Optional)</label>
                        <textarea id="note" name="note" class="form-control" rows="3" placeholder="Add your delivery instructions"></textarea>
                    </div>
                </div>
            </div>
            <div>
                    <!-- Cart Items Section -->
                    <div class="checkout-card order-card">
                        <div class="order-header">
                            <h2 class="checkout-title">Your Order</h2>
                            <span class="item-count">{{ count($cart) }} {{ count($cart) == 1 ? 'item' : 'items' }}</span>
                        </div>
                        
                        <div class="cart-items-container">
                            <table class="cart-items">
                                <thead>
                                    <tr>
                                        <th style="color: white;">Product</th>
                                        <th style="color: white;">Qty</th>
                                        <th style="color: white;">Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $value = 0; @endphp
                                    @foreach($cart as $caart)
                                    <tr 
                                        data-cart-id="{{ $caart->id }}"
                                        data-product-id="{{ $caart->product->id }}"
                                        data-stock="{{ $caart->product->quantity }}"
                                        data-price="{{ $caart->product->price }}"
                                        class="cart-item-row"
                                    >
                                        <td data-label="Product">
                                            <div class="product-info-container">
                                                <div class="product-image-wrapper">
                                                    <img src="{{ asset($caart->product->image) }}" class="cart-item-img" alt="{{ $caart->product->title }}">
                                                </div>
                                                <div class="product-details">
                                                    <span class="product-title">{{ $caart->product->title }}</span>
                                                    <span class="product-price-mobile">{{ $caart->product->price }} BDT</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Quantity">
                                            <div class="controls">
                                                <div class="quantity-box">
                                                    <button type="button" class="decreaseBtn" aria-label="Decrease quantity">−</button>
                                                    <span class="quantity-number" style="color: white;">{{ $caart->quantity }}</span>
                                                    <button type="button" class="increaseBtn" aria-label="Increase quantity">+</button>
                                                </div>
                                            </div>
                                            <div class="stock-info">
                                                <i class="fas fa-box"></i> <span class="stockInfo">{{ $caart->product->quantity }} in stock</span>
                                            </div>
                                        </td>
                                        <td data-label="Price">
                                            <span class="total-price">{{ $caart->product->price * $caart->quantity }} BDT</span>
                                        </td>
                                        <td class="delete-cell" data-label="">
                                            <a href="javascript:void(0);" class="btn-remove" data-cart-id="{{ $caart->id }}" aria-label="Remove item">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php $value += $caart->product->price * $caart->quantity; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        @if(count($cart) == 0)
                        <div class="empty-cart">
                            <i class="fas fa-shopping-cart"></i>
                            <p>Your cart is empty</p>
                            <a href="{{ url('/') }}" class="continue-shopping">Continue Shopping</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div>
                        <!-- Order Summary Section -->
                    <div class="summary-card checkout-card">
                        <h2 class="checkout-title">Order Summary</h2>
                        
                        <div class="form-group payment-method-group">
                            <label class="form-label">Payment Method</label>
                            <div class="payment-options">
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="cod" checked required>
                                    <span class="payment-label">
                                        <i class="fas fa-money-bill-wave"></i>
                                        Cash on Delivery
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="promo-code">
                            <input type="text" class="promo-input" placeholder="Enter Promo Code">
                            <button type="button" class="btn-apply">
                                <i class="fas fa-tag"></i> Apply
                            </button>
                        </div>

                        <div class="summary-details">
                            <div class="summary-row">
                                <span>Subtotal:</span> 
                                <strong><span id="subtotal">{{ $value }} BDT</span></strong>
                            </div>
                            <div class="summary-row">
                                <span>VAT / TAX (0%)</span>
                                <strong><span>0 BDT</span></strong>
                            </div>
                            <div class="summary-row">
                                <span>Delivery Charge:</span> 
                                <strong><span id="delivery-charge">0 BDT</span></strong>
                            </div>
                            <div class="summary-row total-row">
                                <span>Total:</span> 
                                <span id="total-price">{{ $value }} BDT</span>
                                <input type="hidden" name="val" value="{{ $value }}">
                            </div>
                        </div>

                        <button type="submit" class="btn-confirm">
                            <span class="btn-text">Confirm Order</span>
                            <i class="fas fa-check-circle" style="margin-left: 8px;"></i>
                        </button>
                        
                        <div class="secure-checkout">
                            <i class="fas fa-lock"></i> Secure Checkout
                        </div>
                    </div>
                </div>
                

                </form>
            </div>
    </div>
                
                <p class="note-text">
                    <i class="fas fa-info-circle me-2"></i>
                    We'll contact you once the order is confirmed
                </p>
                



    @include('home.info')
    <!-- footer section -->
    @include('home.footer')
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js') }}">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>

  <!-- Delivery charge dynamic calculation -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const csrfToken = '{{ csrf_token() }}';
            let deliveryCharge = 0;
            const deliveryCharges = {
                dhaka: 60,
                suburban: 100,
                outside_dhaka: 120
            };

            function recalculateSubtotal() {
                let subtotal = 0;
                document.querySelectorAll("tr[data-cart-id]").forEach(row => {
                    const unitPrice = parseFloat(row.dataset.price);
                    const quantity = parseInt(row.querySelector(".quantity-number").textContent);
                    subtotal += unitPrice * quantity;
                });
                document.getElementById("subtotal").textContent = subtotal.toFixed(2) + " BDT";
                const total = subtotal + deliveryCharge;
                document.getElementById("total-price").textContent = total.toFixed(2) + " BDT";
            }

            // Listen to delivery zone changes
            document.querySelectorAll('input[name="delivery_zone"]').forEach(radio => {
                radio.addEventListener('change', function () {
                    const selectedZone = this.value;
                    deliveryCharge = deliveryCharges[selectedZone];
                    document.getElementById('delivery-charge').textContent = deliveryCharge + ' BDT';
                    recalculateSubtotal(); // recalculate total with new delivery charge
                });
            });

            // Update cart item count display
            function updateCartItemCount() {
                const itemCount = document.querySelectorAll("tr[data-cart-id]").length;
                const itemCountDisplay = document.querySelector(".item-count");
                if (itemCountDisplay) {
                    itemCountDisplay.textContent = itemCount + (itemCount === 1 ? ' item' : ' items');
                }
            }

            // ========== Cart Quantity Update ==========
            document.querySelectorAll("tr[data-cart-id]").forEach(row => {
                const cartId = row.dataset.cartId;
                const productId = row.dataset.productId;
                let stock = parseInt(row.dataset.stock) || 0;
                const unitPrice = parseFloat(row.dataset.price) || 0;
                let quantityEl = row.querySelector(".quantity-number");
                let quantity = parseInt(quantityEl.textContent) || 1;
                const increaseBtn = row.querySelector(".increaseBtn");
                const decreaseBtn = row.querySelector(".decreaseBtn");
                const stockInfo = row.querySelector(".stockInfo");
                const totalPriceEl = row.querySelector(".total-price");

                function updateUI() {
                    quantityEl.textContent = quantity;
                    stockInfo.textContent = `In Stock: ${stock}`;
                    const itemTotal = unitPrice * quantity;
                    totalPriceEl.textContent = itemTotal.toFixed(2) + " BDT";

                    increaseBtn.disabled = stock <= 0;
                    decreaseBtn.disabled = quantity <= 1;

                    recalculateSubtotal();
                }

                increaseBtn.addEventListener("click", function () {
                    if (stock > 0) {
                        fetch("{{ route('cart.increment') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({ cart_id: cartId, product_id: productId })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                quantity++;
                                stock = data.stock;
                                updateUI();
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => console.error("Error:", error));
                    }
                });

                decreaseBtn.addEventListener("click", function () {
                    if (quantity > 1) {
                        fetch("{{ route('cart.decrement') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({ cart_id: cartId, product_id: productId })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                quantity--;
                                stock = data.stock;
                                updateUI();
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => console.error("Error:", error));
                    }
                });

                updateUI(); // initialize
            });
            
            // Handle remove item buttons
            document.querySelectorAll('.btn-remove').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const row = this.closest('tr');
                    const cartId = this.getAttribute('data-cart-id');
                    
                    if (row && cartId) {
                        // Animation effect
                        row.style.opacity = '0';
                        row.style.transform = 'translateX(20px)';
                        
                        // AJAX request to remove item
                        fetch("{{ route('cart.remove') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({ cart_id: cartId })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                // Update cart count in header
                                const cartCountElements = document.querySelectorAll('.cart-count');
                                cartCountElements.forEach(el => {
                                    el.textContent = data.count;
                                });
                                
                                // Remove the row after animation
                                setTimeout(() => {
                                    row.remove();
                                    
                                    // Update totals
                                    document.getElementById('subtotal').textContent = data.total + " BDT";
                                    document.getElementById('total-price').textContent = (data.total + deliveryCharge) + " BDT";
                                    document.querySelector('input[name="val"]').value = data.total;
                                    
                                    // Update item count display
                                    updateCartItemCount();
                                    
                                    // Show empty cart message if no items left
                                    if (data.count === 0) {
                                        const cartContainer = document.querySelector('.cart-items-container');
                                        if (cartContainer) {
                                            cartContainer.innerHTML = `
                                                <div class="empty-cart">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <p>Your cart is empty</p>
                                                    <a href="{{ url('/') }}" class="continue-shopping">Continue Shopping</a>
                                                </div>
                                            `;
                                        }
                                    }
                                    
                                    // Show success notification
                                    const notyf = new Notyf({
                                        duration: 3000,
                                        position: {x: 'right', y: 'top'},
                                        types: [
                                            {
                                                type: 'warning',
                                                background: '#f05454',
                                                icon: {
                                                    className: 'fas fa-trash',
                                                    tagName: 'i',
                                                    color: 'white'
                                                }
                                            }
                                        ]
                                    });
                                    notyf.open({
                                        type: 'warning',
                                        message: 'Product removed from your cart'
                                    });
                                }, 300);
                            } else {
                                // Show error and revert animation if failed
                                row.style.opacity = '1';
                                row.style.transform = 'translateX(0)';
                                alert(data.message);
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            // Revert animation if error
                            row.style.opacity = '1';
                            row.style.transform = 'translateX(0)';
                        });
                    }
                });
            });
            
            // Fix for iOS devices to ensure proper viewport height
            function setViewportHeight() {
                const vh = window.innerHeight * 0.01;
                document.documentElement.style.setProperty('--vh', `${vh}px`);
            }
            
            setViewportHeight();
            window.addEventListener('resize', setViewportHeight);
            
            // Add loading state to confirm button
            const form = document.querySelector('form');
            const confirmBtn = document.querySelector('.btn-confirm');
            
            if (form && confirmBtn) {
                form.addEventListener('submit', function(e) {
                    // Basic form validation
                    const name = document.getElementById('name');
                    const phone = document.getElementById('phone');
                    const address = document.getElementById('address');
                    const deliveryZones = document.querySelectorAll('input[name="delivery_zone"]');
                    
                    let isValid = true;
                    let checkedZone = false;
                    
                    // Check required fields
                    if (!name.value.trim()) {
                        name.style.borderColor = '#f05454';
                        isValid = false;
                    }
                    
                    if (!phone.value.trim()) {
                        phone.parentElement.style.borderColor = '#f05454';
                        isValid = false;
                    }
                    
                    if (!address.value.trim()) {
                        address.style.borderColor = '#f05454';
                        isValid = false;
                    }
                    
                    // Check if a delivery zone is selected
                    deliveryZones.forEach(zone => {
                        if (zone.checked) {
                            checkedZone = true;
                        }
                    });
                    
                    if (!checkedZone) {
                        document.querySelector('.delivery-options').style.borderColor = '#f05454';
                        isValid = false;
                    }
                    
                    if (!isValid) {
                        e.preventDefault();
                        // Scroll to first error
                        const firstError = document.querySelector('[style*="border-color: #f05454"]');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        return;
                    }
                    
                    // Show loading state
                    confirmBtn.classList.add('loading');
                    confirmBtn.querySelector('.btn-text').style.opacity = '0';
                    confirmBtn.querySelector('i').style.display = 'none';
                });
            }
            
            // Reset border color on input
            document.querySelectorAll('.form-control').forEach(input => {
                input.addEventListener('input', function() {
                    this.style.borderColor = '';
                });
            });
            
            // Reset border color on radio change
            document.querySelectorAll('input[name="delivery_zone"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.querySelector('.delivery-options').style.borderColor = '';
                });
            });

            // Initialize cart count
            updateCartItemCount();
        });
    </script>

  <!-- SHop_selection's Script -->
  <!-- Notyf JS -->
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

  @include('home.cartJS')
</body>

</html>