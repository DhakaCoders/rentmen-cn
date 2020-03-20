<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head> 
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?>

  <link rel="stylesheet" href="<?php echo THEME_URI; ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo THEME_URI; ?>/assets/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/assets/fonts/font-awesome/font-awesome.css">
  
  <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/assets/css/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/assets/fancybox3/dist/jquery.fancybox.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/assets/slick.slider/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/assets/slick.slider/slick.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/assets/fonts/custom-fonts.css">
  <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/assets/css/responsive.css">

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->	

<svg style="display: none;">

  <symbol id="sign-up-icon-svg" width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
  <path d="M22.3928 4.00045C19.9388 1.43903 16.5435 -0.00650486 12.9963 2.2007e-05C5.82769 -0.00900683 0.00903913 5.79496 1.02913e-05 12.9636C-0.00444974 16.5082 1.44093 19.9004 4.00044 22.3526C4.00789 22.36 4.01066 22.3712 4.01806 22.3777C4.09323 22.4501 4.17492 22.5114 4.25107 22.581C4.45993 22.7667 4.66879 22.9588 4.8888 23.138C5.00666 23.2308 5.1292 23.3236 5.2499 23.409C5.45783 23.564 5.66577 23.719 5.88295 23.862C6.03057 23.9549 6.1828 24.0477 6.33406 24.1405C6.53455 24.2612 6.73416 24.3828 6.94117 24.4932C7.11664 24.5861 7.29574 24.6659 7.47398 24.7503C7.66892 24.8432 7.86108 24.936 8.06064 25.0195C8.2602 25.1031 8.46074 25.1681 8.66307 25.2405C8.8654 25.3129 9.03994 25.3797 9.23395 25.4391C9.45304 25.505 9.67767 25.556 9.90045 25.6108C10.0861 25.6563 10.2662 25.7083 10.4574 25.7454C10.7136 25.7965 10.9735 25.829 11.2335 25.8643C11.3941 25.8866 11.5509 25.9181 11.7133 25.9339C12.1385 25.9757 12.5673 25.9989 12.9999 25.9989C13.4325 25.9989 13.8613 25.9757 14.2865 25.9339C14.4489 25.9181 14.6058 25.8866 14.7663 25.8643C15.0263 25.829 15.2862 25.7965 15.5424 25.7454C15.728 25.7083 15.9137 25.6526 16.0993 25.6108C16.3221 25.556 16.5468 25.505 16.7658 25.4391C16.9599 25.3797 17.1473 25.3073 17.3367 25.2405C17.5261 25.1736 17.7415 25.1012 17.9392 25.0195C18.1369 24.9378 18.3309 24.8422 18.5258 24.7503C18.7041 24.6659 18.8832 24.586 19.0586 24.4932C19.2656 24.3828 19.4652 24.2612 19.6657 24.1405C19.8171 24.0477 19.9693 23.9632 20.1169 23.862C20.3341 23.7191 20.542 23.5641 20.7499 23.409C20.8706 23.3162 20.9931 23.2326 21.111 23.138C21.331 22.9616 21.5399 22.7741 21.7487 22.581C21.8248 22.5114 21.9065 22.4502 21.9817 22.3777C21.9891 22.3713 21.992 22.3601 21.9994 22.3526C27.1759 17.3934 27.352 9.17686 22.3928 4.00045ZM20.3064 21.3807C20.1375 21.5293 19.9629 21.6704 19.7866 21.8068C19.6827 21.8867 19.5787 21.9656 19.4719 22.0417C19.3039 22.1633 19.1331 22.2784 18.9595 22.3889C18.8332 22.4696 18.7042 22.5476 18.5742 22.6237C18.4108 22.7166 18.2447 22.8094 18.0767 22.9022C17.9281 22.9783 17.7768 23.0498 17.6246 23.1204C17.4724 23.1909 17.3044 23.2661 17.1401 23.332C16.9757 23.3979 16.8013 23.4601 16.6295 23.5176C16.4726 23.5715 16.3158 23.6272 16.157 23.6745C15.9714 23.7302 15.7774 23.7757 15.5852 23.8221C15.4348 23.8574 15.2863 23.8973 15.1341 23.927C14.9141 23.9697 14.6894 23.9994 14.4639 24.0301C14.3358 24.0468 14.2086 24.07 14.0796 24.083C13.7231 24.1173 13.362 24.1377 12.9972 24.1377C12.6324 24.1377 12.2713 24.1174 11.9148 24.083C11.7858 24.07 11.6586 24.0468 11.5305 24.0301C11.3049 23.9994 11.0803 23.9697 10.8603 23.927C10.708 23.8973 10.5595 23.8574 10.4092 23.8221C10.217 23.7757 10.0258 23.7293 9.83736 23.6745C9.67865 23.6272 9.52173 23.5715 9.36487 23.5176C9.19316 23.4582 9.02139 23.3979 8.85431 23.332C8.68722 23.2661 8.52943 23.1937 8.36974 23.1204C8.21005 23.0471 8.06619 22.9784 7.9177 22.9022C7.74969 22.815 7.58352 22.723 7.42014 22.6237C7.2902 22.5476 7.16113 22.4696 7.03489 22.3889C6.86133 22.2784 6.69049 22.1633 6.52247 22.0417C6.4157 21.9656 6.31176 21.8867 6.20777 21.8068C6.03138 21.6704 5.8569 21.5284 5.68796 21.3807C5.64711 21.3501 5.60996 21.3111 5.57009 21.2758C5.61159 18.1181 7.6402 15.3298 10.632 14.3185C12.1279 15.03 13.8647 15.03 15.3606 14.3185C18.3523 15.3298 20.3809 18.118 20.4224 21.2758C20.3834 21.3111 20.3463 21.3464 20.3064 21.3807ZM9.75931 7.44272C10.7644 5.65523 13.0282 5.02098 14.8157 6.02606C16.6032 7.03115 17.2374 9.29494 16.2323 11.0824C15.8989 11.6755 15.4088 12.1656 14.8157 12.4991C14.8111 12.4991 14.8055 12.4991 14.7999 12.5046C14.5537 12.6416 14.2936 12.7518 14.0239 12.8333C13.9756 12.8472 13.931 12.8657 13.88 12.8778C13.7871 12.902 13.6897 12.9187 13.5941 12.9354C13.414 12.9668 13.2319 12.9851 13.0492 12.9901H12.9433C12.7606 12.9851 12.5785 12.9668 12.3984 12.9354C12.3056 12.9187 12.2072 12.902 12.1126 12.8778C12.0633 12.8657 12.0197 12.8472 11.9687 12.8333C11.699 12.7518 11.4388 12.6417 11.1927 12.5046L11.176 12.4991C9.38848 11.494 8.75423 9.23021 9.75931 7.44272ZM22.0691 19.4351C21.4735 16.6567 19.6439 14.3012 17.0992 13.0366C19.1794 10.7707 19.0287 7.2474 16.7627 5.16724C14.4968 3.08707 10.9735 3.23773 8.89336 5.5037C6.9378 7.63396 6.9378 10.9064 8.89336 13.0366C6.3487 14.3013 4.51911 16.6567 3.92342 19.4351C0.363883 14.4213 1.54285 7.47111 6.55674 3.91158C11.5706 0.352038 18.5208 1.53101 22.0803 6.5449C23.4184 8.42969 24.1366 10.6842 24.1355 12.9957C24.1355 15.3052 23.413 17.5568 22.0691 19.4351Z"/>
  </symbol>
  <symbol id="facebook-icon-svg" width="6" height="12" viewBox="0 0 6 12" xmlns="http://www.w3.org/2000/svg">
  <path d="M1.81807 3.0453V4.22714H0.63623V5.99986H1.81807V11.318H4.18168V5.99986H5.75352L5.95441 4.22714H4.18168V3.19303C4.18168 2.71441 4.22896 2.4603 4.96758 2.4603H5.95441V0.681641H4.37079C2.4799 0.681691 1.81807 1.56803 1.81807 3.0453Z"/>
  </symbol>
  <symbol id="instagram-icon-svg" width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
  <path d="M9.54542 0.0908203H2.45446C1.14906 0.0908203 0.0908203 1.14905 0.0908203 2.45443V9.54531C0.0908203 10.8507 1.14906 11.9089 2.45446 11.9089H9.54542C10.8508 11.9089 11.9091 10.8507 11.9091 9.54531V2.45448C11.9091 1.14905 10.8509 0.0908203 9.54542 0.0908203ZM8.36358 1.86354H10.1363V3.63626H8.36358V1.86354ZM5.99994 3.63631C7.30534 3.63631 8.36358 4.69454 8.36358 5.99992C8.36358 7.3053 7.30534 8.36353 5.99994 8.36353C4.69454 8.36353 3.6363 7.3053 3.6363 5.99992C3.6363 4.69454 4.69454 3.63631 5.99994 3.63631ZM10.7273 9.54536C10.7273 10.1981 10.1981 10.7272 9.54542 10.7272H2.45446C1.80176 10.7272 1.27261 10.1981 1.27261 9.54536V5.40898H2.51352C2.15865 7.33465 3.43201 9.18339 5.3577 9.5383C7.2834 9.89321 9.13216 8.61982 9.48707 6.69415C9.52927 6.46523 9.54882 6.2327 9.54542 5.99992C9.54247 5.80162 9.52272 5.60398 9.48631 5.40903H10.7272V9.54536H10.7273Z"/>
  </symbol>

  <symbol id="search-icon-svg" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.39127 0C3.3092 0 0 3.3092 0 7.39127C0 11.4733 3.3092 14.7825 7.39127 14.7825C11.4733 14.7825 14.7825 11.4733 14.7825 7.39127C14.779 3.31064 11.4719 0.00353495 7.39127 0ZM7.39127 12.2117C4.72904 12.2117 2.57088 10.0535 2.57088 7.39127C2.57088 4.72904 4.72904 2.57088 7.39127 2.57088C10.0535 2.57088 12.2117 4.72904 12.2117 7.39127C12.2081 10.052 10.052 12.2081 7.39127 12.2117Z"/>
  <path d="M17.6167 15.8045L15.0458 13.2336C14.5435 12.7314 13.7292 12.7314 13.2269 13.2336C12.7246 13.7359 12.7246 14.5503 13.2269 15.0525L15.7978 17.6234C16.3001 18.1257 17.1144 18.1257 17.6167 17.6234C18.119 17.1211 18.119 16.3068 17.6167 15.8045Z"/>
  </symbol>

  <symbol id="cart-icon-svg" width="26" height="24" viewBox="0 0 26 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M24.9318 4.33873H4.60293L4.30075 0.972337C4.25133 0.421822 3.78995 0 3.23724 0H1.06778C0.478059 0 0 0.478059 0 1.06778C0 1.65749 0.478059 2.13555 1.06778 2.13555H2.26104C2.91315 9.4006 1.22779 -9.37686 3.48914 15.8178C3.57629 16.8039 4.10911 17.874 5.02699 18.6011C3.37209 20.7145 4.88416 23.8301 7.57613 23.8301C9.81042 23.8301 11.3863 21.6017 10.6201 19.4911H16.4642C15.699 21.599 17.2714 23.8301 19.5082 23.8301C21.2932 23.8301 22.7454 22.3778 22.7454 20.5928C22.7454 18.8078 21.2932 17.3556 19.5082 17.3556H7.58335C6.77224 17.3556 6.06543 16.8662 5.76035 16.1533L22.8248 15.1504C23.2907 15.123 23.6849 14.7962 23.7981 14.3434L25.9677 5.66547C26.1359 4.99257 25.6265 4.33873 24.9318 4.33873ZM7.57613 21.6945C6.96872 21.6945 6.47449 21.2003 6.47449 20.5928C6.47449 19.9854 6.96872 19.4911 7.57613 19.4911C8.18359 19.4911 8.67782 19.9854 8.67782 20.5928C8.67782 21.2003 8.18359 21.6945 7.57613 21.6945ZM19.5081 21.6945C18.9007 21.6945 18.4064 21.2003 18.4064 20.5928C18.4064 19.9854 18.9007 19.4911 19.5081 19.4911C20.1156 19.4911 20.6098 19.9854 20.6098 20.5928C20.6098 21.2003 20.1156 21.6945 19.5081 21.6945ZM21.9165 13.0645L5.47291 14.0309L4.79462 6.47423H23.5642L21.9165 13.0645Z">
  </symbol>
  <symbol id="question-icon-svg" width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
  <path d="M30 0C13.419 0 0 13.4175 0 30C0 46.5807 13.4175 60 30 60C46.581 60 60 46.5825 60 30C60 13.419 46.5825 0 30 0ZM30 55.8139C15.7662 55.8139 4.18605 44.2339 4.18605 30C4.18605 15.7661 15.7662 4.18605 30 4.18605C44.2339 4.18605 55.8139 15.7661 55.8139 30C55.8139 44.2339 44.2339 55.8139 30 55.8139Z"/>
  <path d="M29.1125 37.96C27.4539 37.96 26.1113 39.3421 26.1113 41.0005C26.1113 42.6197 27.4145 44.0413 29.1125 44.0413C30.8105 44.0413 32.153 42.6197 32.153 41.0005C32.153 39.3421 30.7709 37.96 29.1125 37.96Z"/>
  <path d="M29.626 14.938C24.295 14.938 21.8467 18.0972 21.8467 20.2296C21.8467 21.7697 23.1498 22.4805 24.216 22.4805C26.3484 22.4805 25.4797 19.4397 29.5076 19.4397C31.4819 19.4397 33.0616 20.3086 33.0616 22.1251C33.0616 24.2574 30.8502 25.4816 29.5471 26.5872C28.4018 27.5743 26.9013 29.1935 26.9013 32.5896C26.9013 34.643 27.4542 35.2353 29.0732 35.2353C31.008 35.2353 31.403 34.3666 31.403 33.6162C31.403 31.5628 31.4425 30.3781 33.6144 28.6801C34.6806 27.8509 38.0371 25.1655 38.0371 21.4536C38.0371 17.7417 34.6806 14.938 29.626 14.938Z"/>
  </symbol>
  <!-- end of Rannojit -->

  <symbol id="post-cty-table-icon-svg" width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
  <path d="M20.6188 7.84709V5.94238H5.38124V7.84709H12.0477V20.545H9.82551V22.4497H16.1745V20.545H13.9524V7.84709H20.6188Z"/>
  <path d="M24.588 11.6568L26 3.89098L24.126 3.55029L22.9984 9.75216H18.0792V11.6568H20.3013V20.5454H18.0792V22.4501H24.4281V20.5454H22.206V11.6568H24.588Z"/>
  <path d="M7.92081 11.6568V9.75216H3.00153L1.87398 3.55029L0 3.89098L1.41192 11.6568H3.79402V20.5454H1.57188V22.4501H7.92081V20.5454H5.69872V11.6568H7.92081Z"/>
  </symbol>
  <symbol id="dw-question-icon-svg" width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
  <path d="M30 0C13.419 0 0 13.4175 0 30C0 46.5807 13.4175 60 30 60C46.581 60 60 46.5825 60 30C60 13.419 46.5825 0 30 0ZM30 55.8139C15.7662 55.8139 4.18605 44.2339 4.18605 30C4.18605 15.7661 15.7662 4.18605 30 4.18605C44.2339 4.18605 55.8139 15.7661 55.8139 30C55.8139 44.2339 44.2339 55.8139 30 55.8139Z"/>
  <path d="M29.1123 37.96C27.4538 37.96 26.1111 39.3421 26.1111 41.0005C26.1111 42.6197 27.4143 44.0413 29.1123 44.0413C30.8104 44.0413 32.1529 42.6197 32.1529 41.0005C32.1529 39.3421 30.7708 37.96 29.1123 37.96Z"/>
  <path d="M29.6256 14.938C24.2945 14.938 21.8462 18.0972 21.8462 20.2296C21.8462 21.7697 23.1493 22.4805 24.2155 22.4805C26.3479 22.4805 25.4792 19.4397 29.5071 19.4397C31.4815 19.4397 33.0611 20.3086 33.0611 22.1251C33.0611 24.2574 30.8497 25.4816 29.5466 26.5872C28.4013 27.5743 26.9008 29.1935 26.9008 32.5896C26.9008 34.643 27.4537 35.2353 29.0727 35.2353C31.0076 35.2353 31.4025 34.3666 31.4025 33.6162C31.4025 31.5628 31.442 30.3781 33.6139 28.6801C34.6801 27.8509 38.0366 25.1655 38.0366 21.4536C38.0366 17.7417 34.6801 14.938 29.6256 14.938Z"/>
  </symbol>

  <!-- end of Milon -->
  <symbol id="contact-map-icon-svg" width="30" height="40" viewBox="0 0 30 40" xmlns="http://www.w3.org/2000/svg">
  <path d="M14.9998 0C22.9877 0 29.4863 6.49859 29.4863 14.4864C29.4863 24.3995 16.5223 38.9526 15.9704 39.5673C15.452 40.1447 14.5468 40.1437 14.0293 39.5673C13.4773 38.9526 0.513359 24.3995 0.513359 14.4864C0.513515 6.49859 7.01203 0 14.9998 0ZM14.9998 21.7749C19.0188 21.7749 22.2883 18.5053 22.2883 14.4864C22.2883 10.4675 19.0187 7.19797 14.9998 7.19797C10.981 7.19797 7.71148 10.4676 7.71148 14.4865C7.71148 18.5054 10.981 21.7749 14.9998 21.7749Z"/>
  </symbol>
  <symbol id="contact-phone-icon-svg" width="36" height="36" viewBox="0 0 36 36"  xmlns="http://www.w3.org/2000/svg">
  <g clip-path="url(#clip0)">
  <path d="M25.9078 36C19.5969 36 12.8575 33.681 7.58812 28.4118C2.32755 23.1512 0 16.4163 0 10.0922C0 4.51856 4.50928 0 10.0922 0C10.5235 0 10.9112 0.262547 11.0714 0.662977L15.5902 11.9599C15.8065 12.5007 15.5435 13.1145 15.0027 13.3308L10.0389 15.3163C10.39 21.027 14.974 25.6106 20.6837 25.9613L22.6692 20.9974C22.8851 20.4575 23.4986 20.1935 24.0402 20.4099L35.337 24.9286C35.7374 25.0888 36 25.4765 36 25.9078C36 31.4814 31.4907 36 25.9078 36Z"/>
  </g>
  <defs>
  <clipPath id="clip0">
  <rect width="36" height="36"/>
  </clipPath>
  </defs>
  </symbol>

  <symbol id="contact-mail-icon-svg" width="36" height="36" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
  <g clip-path="url(#clip0)">
  <path d="M21.0086 22.0566C20.113 22.6537 19.0726 22.9693 18 22.9693C16.9275 22.9693 15.8871 22.6537 14.9915 22.0566L0.239695 12.2218C0.157852 12.1672 0.0781172 12.1103 0 12.0518V28.1672C0 30.0149 1.49941 31.4813 3.31404 31.4813H32.6859C34.5336 31.4813 35.9999 29.9819 35.9999 28.1672V12.0518C35.9217 12.1104 35.8418 12.1674 35.7597 12.2221L21.0086 22.0566Z"/>
  <path d="M1.40977 10.4664L16.1615 20.3013C16.72 20.6736 17.3599 20.8597 17.9999 20.8597C18.64 20.8597 19.28 20.6736 19.8385 20.3013L34.5902 10.4664C35.473 9.87827 36 8.89389 36 7.83147C36 6.00468 34.5138 4.51855 32.6871 4.51855H3.31291C1.4862 4.51863 0 6.00475 0 7.83323C0 8.89389 0.527062 9.87827 1.40977 10.4664Z"/>
  </g>
  <defs>
  <clipPath id="clip0">
  <rect width="36" height="36"/>
  </clipPath>
  </defs>
  </symbol>



  <symbol id="ftr-map-icon-svg" width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
  <path d="M9.50002 0C13.2943 0 16.3811 3.08683 16.3811 6.88104C16.3811 11.5898 10.2232 18.5025 9.96103 18.7945C9.71478 19.0687 9.28483 19.0682 9.03901 18.7945C8.77684 18.5025 2.61894 11.5898 2.61894 6.88104C2.61902 3.08683 5.70581 0 9.50002 0ZM9.50002 10.3431C11.409 10.3431 12.962 8.79002 12.962 6.88104C12.962 4.97206 11.409 3.41904 9.50002 3.41904C7.59108 3.41904 6.03805 4.9721 6.03805 6.88108C6.03805 8.79006 7.59108 10.3431 9.50002 10.3431Z" />
  </symbol>
  <symbol id="ftr-cell-icon-svg" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
  <g clip-path="url(#clip0)">
  <path d="M12.9539 18C9.79843 18 6.42874 16.8405 3.79406 14.2059C1.16378 11.5756 0 8.20814 0 5.04608C0 2.25928 2.25464 0 5.04608 0C5.26173 0 5.45562 0.131273 5.5357 0.331488L7.79509 5.97994C7.90327 6.25036 7.77175 6.55724 7.50136 6.66541L5.01943 7.65816C5.195 10.5135 7.48698 12.8053 10.3418 12.9806L11.3346 10.4987C11.4426 10.2287 11.7493 10.0967 12.0201 10.2049L17.6685 12.4643C17.8687 12.5444 18 12.7383 18 12.9539C18 15.7407 15.7454 18 12.9539 18Z" />
  </g>
  <defs>
  <clipPath id="clip0">
  <rect width="18" height="18" />
  </clipPath>
  </defs>
  </symbol>  
  <symbol id="ftr-mail-icon-svg" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
  <g clip-path="url(#clip0)">
  <path d="M10.5043 11.0278C10.0565 11.3264 9.53631 11.4842 9 11.4842C8.46373 11.4842 7.94355 11.3264 7.49573 11.0278L0.119848 6.1104C0.0789258 6.08312 0.0390586 6.05468 0 6.02543V14.0831C0 15.007 0.749707 15.7402 1.65702 15.7402H16.3429C17.2668 15.7402 18 14.9904 18 14.0831V6.02539C17.9608 6.05471 17.9209 6.08322 17.8799 6.11054L10.5043 11.0278Z" />
  <path d="M0.704883 5.23273L8.08077 10.1502C8.35998 10.3363 8.67997 10.4294 8.99996 10.4294C9.31999 10.4294 9.64002 10.3363 9.91923 10.1502L17.2951 5.23273C17.7365 4.93864 18 4.44646 18 3.91525C18 3.00185 17.2569 2.25879 16.3435 2.25879H1.65646C0.743098 2.25882 0 3.00189 0 3.91613C0 4.44646 0.263531 4.93864 0.704883 5.23273Z" />
  </g>
  <defs>
  <clipPath id="clip0">
  <rect width="18" height="18" />
  </clipPath>
  </defs>
  </symbol>
  <symbol id="pro-des-bq-svg" width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M13.8677 22.0933L13.7638 22.0907C12.5126 22.0629 11.4735 23.048 11.4421 24.2989C11.4108 25.5497 12.3994 26.5892 13.6503 26.6206L13.7735 26.6235C18.6715 26.7183 22.6562 30.7827 22.6562 35.6836C22.6562 40.6807 18.5908 44.7461 13.5938 44.7461C8.59669 44.7461 4.53125 40.6807 4.53125 35.6836C4.53125 29.4421 6.01569 23.6826 8.94367 18.5651C11.1319 14.7402 13.3572 12.7198 13.3988 12.6824C14.332 11.854 14.4197 10.4258 13.5934 9.48926C12.7654 8.55118 11.3339 8.46157 10.3956 9.28932C10.2861 9.38606 7.68296 11.7078 5.12054 16.1241C2.78445 20.1503 0 26.8118 0 35.6836C0 43.1792 6.09816 49.2774 13.5938 49.2774C21.0893 49.2774 27.1875 43.1792 27.1875 35.6836C27.1875 32.0993 25.8046 28.7172 23.2936 26.1602C20.7876 23.6084 17.4401 22.1642 13.8677 22.0933Z" fill="white"/>
  <path d="M54.1061 26.1602C51.6 23.6083 48.2527 22.164 44.68 22.0932L44.5763 22.0906C43.3292 22.0629 42.286 23.048 42.2546 24.2988C42.2232 25.5497 43.2119 26.5891 44.4628 26.6205L44.586 26.6235C49.484 26.7184 53.4688 30.7828 53.4688 35.6836C53.4688 40.6807 49.4033 44.7461 44.4062 44.7461C39.4092 44.7461 35.3438 40.6807 35.3438 35.6836C35.3438 29.442 36.8282 23.6825 39.7561 18.5652C41.9443 14.7403 44.1696 12.7199 44.2112 12.6825C45.1445 11.854 45.2321 10.4258 44.4058 9.48934C43.5779 8.55115 42.1463 8.46154 41.208 9.2894C41.0986 9.38614 38.4953 11.7078 35.9329 16.1242C33.597 20.1502 30.8125 26.8117 30.8125 35.6836C30.8125 43.1792 36.9107 49.2773 44.4062 49.2773C51.9018 49.2773 58 43.1792 58 35.6836C58 32.0993 56.6171 28.7171 54.1061 26.1602Z" fill="white"/>
  </symbol>
  <symbol id="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg">
  <path d="M28.7674 5.09795H5.31106L4.9624 1.14248C4.90537 0.495635 4.37301 0 3.73528 0H1.23205C0.551605 0 0 0.561712 0 1.25462C0 1.94753 0.551605 2.50924 1.23205 2.50924H2.60889C3.36132 11.0456 1.41668 -11.0177 4.02592 18.5857C4.12648 19.7443 4.74127 21.0017 5.80036 21.856C3.89087 24.3392 5.63556 28 8.74167 28C11.3197 28 13.138 25.3817 12.2539 22.9018H18.9971C18.1142 25.3785 19.9286 28 22.5094 28C24.569 28 26.2447 26.2937 26.2447 24.1963C26.2447 22.0989 24.569 20.3926 22.5094 20.3926H8.75C7.81412 20.3926 6.99856 19.8176 6.64655 18.9799L26.3363 17.8015C26.8738 17.7693 27.3286 17.3853 27.4593 16.8533L29.9627 6.65685C30.1568 5.8662 29.569 5.09795 28.7674 5.09795ZM8.74167 25.4908C8.04081 25.4908 7.47055 24.91 7.47055 24.1963C7.47055 23.4825 8.04081 22.9018 8.74167 22.9018C9.44259 22.9018 10.0129 23.4825 10.0129 24.1963C10.0129 24.91 9.44259 25.4908 8.74167 25.4908ZM22.5093 25.4908C21.8084 25.4908 21.2382 24.91 21.2382 24.1963C21.2382 23.4825 21.8084 22.9018 22.5093 22.9018C23.2103 22.9018 23.7805 23.4825 23.7805 24.1963C23.7805 24.91 23.2103 25.4908 22.5093 25.4908ZM25.2883 15.3507L6.31489 16.4861L5.53225 7.60713H27.1894L25.2883 15.3507Z" />
  </symbol>
  <symbol id="pro-cart-btn-svg" width="26" height="24" viewBox="0 0 26 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M24.9318 4.33873H4.60293L4.30075 0.972337C4.25133 0.421822 3.78995 0 3.23724 0H1.06778C0.478059 0 0 0.478059 0 1.06778C0 1.65749 0.478059 2.13555 1.06778 2.13555H2.26104C2.91315 9.4006 1.22779 -9.37686 3.48914 15.8178C3.57629 16.8039 4.10911 17.874 5.02699 18.6011C3.37209 20.7145 4.88416 23.8301 7.57613 23.8301C9.81042 23.8301 11.3863 21.6017 10.6201 19.4911H16.4642C15.699 21.599 17.2714 23.8301 19.5082 23.8301C21.2932 23.8301 22.7454 22.3778 22.7454 20.5928C22.7454 18.8078 21.2932 17.3556 19.5082 17.3556H7.58335C6.77224 17.3556 6.06543 16.8662 5.76035 16.1533L22.8248 15.1504C23.2907 15.123 23.6849 14.7962 23.7981 14.3434L25.9677 5.66547C26.1359 4.99257 25.6265 4.33873 24.9318 4.33873ZM7.57613 21.6945C6.96872 21.6945 6.47449 21.2003 6.47449 20.5928C6.47449 19.9854 6.96872 19.4911 7.57613 19.4911C8.18359 19.4911 8.67782 19.9854 8.67782 20.5928C8.67782 21.2003 8.18359 21.6945 7.57613 21.6945ZM19.5081 21.6945C18.9007 21.6945 18.4064 21.2003 18.4064 20.5928C18.4064 19.9854 18.9007 19.4911 19.5081 19.4911C20.1156 19.4911 20.6098 19.9854 20.6098 20.5928C20.6098 21.2003 20.1156 21.6945 19.5081 21.6945ZM21.9165 13.0645L5.47291 14.0309L4.79462 6.47423H23.5642L21.9165 13.0645Z" />
  </symbol>
  <symbol id="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" xmlns="http://www.w3.org/2000/svg">
  <path d="M28.7674 5.09795H5.31106L4.9624 1.14248C4.90537 0.495635 4.37301 0 3.73528 0H1.23205C0.551605 0 0 0.561712 0 1.25462C0 1.94753 0.551605 2.50924 1.23205 2.50924H2.60889C3.36132 11.0456 1.41668 -11.0177 4.02592 18.5857C4.12648 19.7443 4.74127 21.0017 5.80036 21.856C3.89087 24.3392 5.63556 28 8.74167 28C11.3197 28 13.138 25.3817 12.2539 22.9018H18.9971C18.1142 25.3785 19.9286 28 22.5094 28C24.569 28 26.2447 26.2937 26.2447 24.1963C26.2447 22.0989 24.569 20.3926 22.5094 20.3926H8.75C7.81412 20.3926 6.99856 19.8176 6.64655 18.9799L26.3363 17.8015C26.8738 17.7693 27.3286 17.3853 27.4593 16.8533L29.9627 6.65685C30.1568 5.8662 29.569 5.09795 28.7674 5.09795ZM8.74167 25.4908C8.04081 25.4908 7.47055 24.91 7.47055 24.1963C7.47055 23.4825 8.04081 22.9018 8.74167 22.9018C9.44259 22.9018 10.0129 23.4825 10.0129 24.1963C10.0129 24.91 9.44259 25.4908 8.74167 25.4908ZM22.5093 25.4908C21.8084 25.4908 21.2382 24.91 21.2382 24.1963C21.2382 23.4825 21.8084 22.9018 22.5093 22.9018C23.2103 22.9018 23.7805 23.4825 23.7805 24.1963C23.7805 24.91 23.2103 25.4908 22.5093 25.4908ZM25.2883 15.3507L6.31489 16.4861L5.53225 7.60713H27.1894L25.2883 15.3507Z" />
  </symbol>
  <!-- end of Prashanto -->

  <symbol id="faq-right-arrow-svg" width="16" height="14" viewBox="0 0 16 14" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.7443 6.03377L9.9661 0.255478C9.80115 0.0905358 9.58132 0 9.34692 0C9.11225 0 8.89254 0.0906659 8.7276 0.255478L8.20299 0.780221C8.03818 0.944903 7.94738 1.16487 7.94738 1.3994C7.94738 1.63381 8.03818 1.86119 8.20299 2.02587L11.5739 5.40418H0.864383C0.381525 5.40418 0 5.7822 0 6.26518V7.00703C0 7.49002 0.381525 7.90615 0.864383 7.90615H11.6121L8.20312 11.3033C8.03831 11.4683 7.94751 11.6822 7.94751 11.9168C7.94751 12.1511 8.03831 12.3682 8.20312 12.533L8.72773 13.056C8.89267 13.221 9.11238 13.3108 9.34704 13.3108C9.58145 13.3108 9.80128 13.2198 9.96623 13.0549L15.7444 7.27669C15.9097 7.11123 16.0006 6.89035 16 6.65555C16.0005 6.41998 15.9097 6.19897 15.7443 6.03377Z" fill="#F3BF00"/>
  </symbol>
  <symbol id="faq-left-arrow-svg" width="28" height="8" viewBox="0 0 28 8" xmlns="http://www.w3.org/2000/svg">
  <path d="M0.472126 3.08605L4.5577 0.205728C5.29795 -0.31609 6.32108 0.215273 6.32108 1.12005V2.88171H25.9379C26.5557 2.88171 27.0566 3.38257 27.0566 4.00045C27.0566 4.61832 26.5557 5.11911 25.9379 5.11911H6.32123V6.8807C6.32123 7.79144 5.29266 8.31288 4.55792 7.79502L0.472349 4.91469C-0.151566 4.47513 -0.164167 3.53561 0.472126 3.08605Z"/>
  </symbol>

  <symbol id="breadcrumbs-left-arrow-svg" width="28" height="8" viewBox="0 0 28 8" xmlns="http://www.w3.org/2000/svg">
  <path d="M0.472492 3.08605L4.55806 0.205728C5.29832 -0.31609 6.32145 0.215273 6.32145 1.12005V2.88171H25.9383C26.5561 2.88171 27.057 3.38257 27.057 4.00045C27.057 4.61832 26.5561 5.11911 25.9383 5.11911H6.32159V6.8807C6.32159 7.79144 5.29302 8.31288 4.55829 7.79502L0.472715 4.91469C-0.151199 4.47513 -0.163801 3.53561 0.472492 3.08605Z" fill="#F3BF00"/>
  </symbol>
  



  <!-- end of Shoriful -->




</svg>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
  $logoObj = get_field('logo_header', 'options');
  $smedias = get_field('sociale_media', 'options');
?>
<header class="header">
  <div class="hdr-topbar">
    <div class="container-lg">
      <div class="row">
        <div class="col-md-12">
          <div class="hdr-topbar-inr clearfix">
            <div class="hdr-lft">
              <div class="logo">
                <?php 
                if( is_array($logoObj) ){
                    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                </a>
                <?php } ?>
              </div>
            </div>
            <div class="hdr-rgt">
              <nav class="main-nav">
              <?php 
                $mmenuOptions = array( 
                    'theme_location' => 'cbv_main_menu', 
                    'menu_class' => 'clearfix reset-list',
                    'container' => 'mnav',
                    'container_class' => 'mnav'
                  );
                wp_nav_menu( $mmenuOptions ); 
              ?>
              </nav>

              <div class="hdr-icons-cntlr clearfix">
                <?php if(!empty($smedias)): ?>
                <div class="hdr-social">
                  <ul class="reset-list">
                    <?php foreach($smedias as $smedia):  ?>
                    <li>
                      <a target="_blank" href="<?php echo $smedia['url']; ?>">
                        <?php echo $smedia['icon']; ?>
                      </a>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <?php endif; ?>
                <div class="hdr-sign-up">
                  <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                    <i>
                      <svg class="sign-up-icon-svg" width="26" height="26" viewBox="0 0 26 26" fill="#1E1E1E;">
                        <use xlink:href="#sign-up-icon-svg"></use>
                      </svg> 
                    </i>
                    <strong>Aanmelden</strong>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
  <?php 

    $terms = get_terms( array(
      'taxonomy' => 'product_cat',
      'orderby' => 'name',
      'order' => 'ASC',
      'hide_empty' => false,
    ) );
  if( isset($_GET['p']) && !empty($_GET['p']) )
    $keyword = $_GET['p'];
  else
    $keyword = '';
  ?>
  <div class="hdr-btmbar">
    <div class="container-lg">
      <div class="row">
        <div class="col-md-12">
          <div class="hdr-btmbar-inr">
            
              <div class="hdr-btm-select-filter">
                <div class="rm-selctpicker-ctlr reset-list">
                  <select class="selectpicker" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <?php 
                      if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                        $term_selected = '';
                        $ccat = get_queried_object();
                     ?>
                      <?php 
                      foreach ( $terms as $term ) { 
                      
                        if($term->slug != 'uncategorized'):
                      ?>
                      <option value="<?php echo esc_url( get_term_link($term) );?>" <?php echo( (@$ccat->term_id == $term->term_id) && is_tax('product_cat') )? 'selected': ''; ?>><?php echo $term->name; ?></option>
                      <?php endif; } ?>
                    <?php } ?>
                  </select>
                </div>
              </div>
              
              <div class="hdr-search-form">
                <form action="" method="get">
                <div class="rm-search-form">
                  <input type="search" name="p" value="<?php echo $keyword; ?>" placeholder="Zoek een artikel om je event kracht bij te zetten">
                  <div class="rm-search-submit-btn">
                    <button>
                      <i>
                        <svg class="search-icon-svg" width="18" height="18" viewBox="0 0 18 18" fill="#1E1E1E;">
                          <use xlink:href="#search-icon-svg"></use>
                        </svg> 
                      </i>
                      Zoeken
                    </button>
                  </div>
                </div>
                </form>
              </div>
              
              <div class="hdr-cart-btn">
                <a href="<?php echo wc_get_cart_url(); ?>">
                  <i>
                    <svg class="cart-icon-svg" width="26" height="24" viewBox="0 0 26 24" fill="#FFFFFF">
                      <use xlink:href="#cart-icon-svg"></use>
                    </svg> 
                  </i>
                  Winkelmand
                </a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</header>