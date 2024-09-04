<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar a:hover,
        .dropdown:hover .dropbtn {
            background-color: red;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .active {
            background-color: orange;
        }

        .float-right {
            float: right !important;
        }

        .bg-orangered {
            background-color: orangered;
        }
    </style>
</head>

<body style="background-color:white;">
    <?php
    /**
     * Hiển thị menu dropdown cấp sử mảng PHP
     */
    $menu = [
        [
            'title' => 'Home',
            'link' => '#',
            'class' => 'active'
        ],
        [
            'title' => 'News',
            'link' => '#',
            'class' => ''
        ],
        [
            'title' => 'Dropdown',
            'link' => '#',
            'class' => 'dropdown',
            'sub' => [
                [
                    'title' => 'Link 1',
                    'link' => '#',
                    'class' => ''
                ],
                [
                    'title' => 'Link 2',
                    'link' => '#',
                    'class' => ''
                ],
                [
                    'title' => 'Link 3',
                    'link' => '#',
                    'class' => ''
                ]
            ],
        ],
        [
            'title' => 'Level 1',
            'link' => '#',
            'class' => 'dropdown',
            'sub' => [
                [
                    'title' => 'Level 2',
                    'link' => '#',
                    'class' => ''
                ],
                [
                    'title' => 'Level 2',
                    'link' => '#',
                    'class' => ''
                ],
                [
                    'title' => 'Level 2',
                    'link' => '#',
                    'class' => ''
                ]
            ],
        ],
        [
            'title' => 'Buy Now',
            'link' => '#',
            'class' => 'float-right bg-orangered'
        ]
    ];

    // echo "<pre>";
    // print_r($menu);
    // echo "</pre>";

    if (!empty($menu) && is_array($menu)) {
        echo '<div class="navbar">';
        foreach ($menu as $item) {
            $cssClass = !empty($item['class']) ? 'class="' . $item['class'] . '"' : null;
            $cssClass = !empty($item['sub']) ? 'class="' . $item['class'] . '"' : $cssClass;
            if (!empty($item['sub'])) {
                $subMenu = $item['sub'];
                echo '<div ' . $cssClass . '><button class="dropbtn">' . $item['title'] . ' <i class="fa fa-caret-down"></i></button><div class="dropdown-content">';
                foreach ($subMenu as $sub) {
                    echo '<a href="' . $sub['link'] . '" ' . $cssClass . '>' . $sub['title'] . '</a>';
                }
                echo '</div></div>';
            } else {
                echo '<a href="' . $item['link'] . '" ' . $cssClass . '>' . $item['title'] . '</a>';
            }
        }
        echo '</div>';
    }
    ?>
    <!-- <div class="navbar">
        <a href="#home">Home</a>
        <a href="#news">News</a>
        <div class="dropdown">
            <button class="dropbtn">Dropdown
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div>
    </div> -->
</body>

</html>