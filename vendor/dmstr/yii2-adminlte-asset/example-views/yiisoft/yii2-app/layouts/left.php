<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->UserName?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    
                    ['label' => 'User Management', 'options' => ['class' => 'header']],
                    [
                        'label' => 'User Permission',
                        'visible'=>Yii::$app->user->identity->UserType<=app\models\Users::ROLE_ADMIN,
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'User Entry', 'icon' => 'circle-o', 'url' => ['/users/index'],],
                            ['label' => 'Role Entry', 'icon' => 'circle-o', 'url' => ['/user-type/index'],],
                            ['label' => 'Role Permission', 'icon' => 'circle-o', 'url' => ['/role-assignment/index'],],
                            ['label' => 'Branch Permission', 'icon' => 'circle-o', 'url' => ['/branch-permission/index'],],
                            ['label' => 'Time Slots', 'icon' => 'circle-o', 'url' => ['/time-slots/index'],],
                        ],
                    ],
                    ['label' => 'Employee Management', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Manage Employee',
                        'visible'=>Yii::$app->user->identity->UserType==app\models\Users::ROLE_USER,
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'View Employee', 'icon' => 'circle-o', 'url' => ['/employee/index'],],
                          
                        ],
                    ],
                    [
                        'label' => 'Manage Employee',
                        'visible'=>Yii::$app->user->identity->UserType<=app\models\Users::ROLE_MODERATOR,
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            /*['label' => 'Employee Profile', 'icon' => 'circle-o', 'url' => ['/employee-management/create'],],
                            ['label' => 'Employee Details', 'icon' => 'circle-o', 'url' => ['/employee-management/index'],],*/
                            /*['label' => 'Add Employee', 'icon' => 'circle-o', 'url' => ['/employee/create'],],*/
                            ['label' => 'View Employee', 'icon' => 'circle-o', 'url' => ['/employee/index'],],
                        ],
                    ],
                    ['label' => 'Attendance Management', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Attendance Management',
                        'visible'=>Yii::$app->user->identity->UserType<=app\models\Users::ROLE_MODERATOR && Yii::$app->user->identity->UserType > app\models\Users::ROLE_ADMIN,
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Employee Attendance', 'icon' => 'circle-o', 'url' => ['/employee/index'],],
                            ['label' => 'Change Request', 'icon' => 'circle-o', 'url' => ['/change-request/index'],],
                        ],
                    ],
                    [
                        'label' => 'Attendance Management',
                        'visible'=>Yii::$app->user->identity->UserType==app\models\Users::ROLE_USER,
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Create Employee(Temp)', 'icon' => 'circle-o', 'url' => ['/employee/create'],],
                            ['label' => 'Employee Attendance', 'icon' => 'circle-o', 'url' => ['/employee/index'],],
                            
                        ],
                    ],
                    [
                        'label' => 'Attendance Management',
                        'visible'=>Yii::$app->user->identity->UserType<=app\models\Users::ROLE_ADMIN,
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            
                            ['label' => 'Employee Attendance', 'icon' => 'circle-o', 'url' => ['/employee/index'],],
                            ['label' => 'Change Request', 'icon' => 'circle-o', 'url' => ['/change-request/reverse-index'],],
                            ['label' => 'Employee Criteria', 'icon' => 'circle-o', 'url' => ['/attendance-criteria/index'],],
                            
                        ],
                    ],
                    /*['label' => 'Leave Management', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Leave Master',
                        'visible'=>Yii::$app->user->identity->UserType<=app\models\Users::ROLE_ADMIN,
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Leave Category Master', 'icon' => 'circle-o', 'url' => ['/leave-category/index'],],
                            ['label' => 'Holiday Master', 'icon' => 'circle-o', 'url' => ['/holiday-master/index'],],
                        ],
                    ],*/
                    /*['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],*/
                    
                ],
            ]
        ) ?>

    </section>

</aside>
