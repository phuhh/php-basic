<?php
require_once './my_recursion_func.php';
/**
 * Bài 07: Hiển thị menu đa cấp sử dụng giải thuật đệ quy
 * 
 * Lưu ý: dữ liệu là mảng đa chiều
 */

$menu = [
    [
        'title' => 'Trang Chủ',
        'link' => '#trang-chu'
    ],
    [
        'title' => 'Tin Tức',
        'link' => '#tin-tuc'
    ],
    [
        'title' => 'Sản Phẩm',
        'link' => '#trang-chu',
        'sub' => [
            [
                'title' => 'Điện Thoại',
                'link' => '#dien-thoai',
                'sub' => [
                    [
                        'title' => 'Apple',
                        'link' => '#apple',
                        'sub' => [
                            [
                                'title' => 'Iphone 13',
                                'link' => '#iphone-13'
                            ],
                            [
                                'title' => 'Iphone 14',
                                'link' => '#iphone-14'
                            ],
                            [
                                'title' => 'Iphone 15',
                                'link' => '#iphone-15'
                            ],
                        ]
                    ],
                    [
                        'title' => 'Samsung',
                        'link' => '#samsung'
                    ],
                ]
            ],
            [
                'title' => 'Máy Tính',
                'link' => '#may-tinh',
                'sub' => [
                    [
                        'title' => 'Acer',
                        'link' => '#acer'
                    ],
                    [
                        'title' => 'Dell',
                        'link' => '#dell'
                    ],
                    [
                        'title' => 'HP',
                        'link' => '#hp'
                    ],
                ]
            ],
            [
                'title' => 'Linh Kiện',
                'link' => '#linh-kien',
                'sub' => [
                    [
                        'title' => 'Túi xách',
                        'link' => '#tui-xach'
                    ]
                ]
            ],
        ]
    ],
    [
        'title' => 'Liên Hệ',
        'link' => '#lien-he'
    ]
];
/**
 *  Cách giải đơn giản nhưng không tối ưu
 */
buildMenuBasic($menu);
echo '<hr>';

/**
 *  Cách 2: dùng đệ quy
 */
buildMenu($menu);

?>
<!-- <ul>
    <li>
        <a href="#">Level 1</a>
        <ul class="sub-menu">
            <li><a href="#">Level 2</a></li>
            <li>
                <a href="#">Level 2</a>
                <ul class="sub-menu">
                    <li><a href="#">Level 3</a></li>
                    <li><a href="#">Level 3</a></li>
                </ul>
            </li>
            <li><a href="#">Level 2</a></li>
        </ul>
    </li>
    <li><a href="#">Level 1</a></li>
    <li><a href="#">Level 1</a></li>
</ul> -->