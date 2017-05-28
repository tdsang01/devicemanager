<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ClassroomTableSeeder::class);
        $this->call(DeviceCatTableSeeder::class);
        $this->call(DeviceLocationTableSeeder::class);
        $this->call(DeviceStatusTableSeeder::class);
        $this->call(PeriodOfClassTableSeeder::class);
    }
}

class UserTableSeeder extends Seeder {
	public function run(){
		DB::table('users')->insert([
			['name' => 'Trần Đình Sáng',
			 'email' => 'sangtran.bkdn'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '0968694469',
			 'role' => '2'
			],
			['name' => 'Lê Đình Vũ',
			 'email' => 'ledinhvu'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '0983804338',
			 'role' => '2'
			],
			['name' => 'Vũ Ngọc Sơn',
			 'email' => 'vungocson'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '0983234871',
			 'role' => '2'
			],
			['name' => 'Lê Đức Tiến',
			 'email' => 'leductien'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '0915025488',
			 'role' => '3'
			],
			['name' => 'Ngô Viết Thành',
			 'email' => 'ngovietthanh'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '0968542258',
			 'role' => '3'
			],
			['name' => 'Dương Minh Ngọc',
			 'email' => 'duongminhngoc'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '01265109857',
			 'role' => '3'
			],
			['name' => 'Bùi Văn Thanh Khuê',
			 'email' => 'buivanthanhkhue'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '0965487758',
			 'role' => '1'
			],
			['name' => 'Nguyễn Văn Phú',
			 'email' => 'nguyenvanphu'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '0965214785',
			 'role' => '1'
			],
			['name' => 'Nguyễn Văn Liệu',
			 'email' => 'nguyenvanlieu'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '0915365875',
			 'role' => '1'
			],
			['name' => 'Trần Quốc Ngọc',
			 'email' => 'tranquocngoc'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '01245257996',
			 'role' => '1'
			],
			['name' => 'Đoàn Thị Thủy',
			 'email' => 'doanthithuy'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '01689986828',
			 'role' => '1'
			],
			['name' => 'Nguyễn Văn Tuấn',
			 'email' => 'nguyenvantuan'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '01686528974',
			 'role' => '1'
			],
			['name' => 'Lê Đình Toàn',
			 'email' => 'ledinhtoan'.'@gmail.com',
			 'password' => Hash::make('123456'),
			 'phone' => '01254862178',
			 'role' => '1'
			]
		]);
	}
}

class RoleTableSeeder extends Seeder{
	public function run(){
		DB::table('roles')->insert([
			['name' => 'Giảng viên'],
			['name' => 'Quản lý'],
			['name' => 'Nhân viên phòng nước']
		]);
	}
}

class ClassroomTableSeeder extends Seeder{
	public function run(){
		DB::table('classrooms')->insert([
			['name' => 'Chung'],
			['name' => 'B101'],//B
			['name' => 'B102'],
			['name' => 'B103'],
			['name' => 'B104'],
			['name' => 'B105'],
			['name' => 'B106'],
			['name' => 'B107'],
			['name' => 'B108'],
			['name' => 'B109'],
			['name' => 'B201'],
			['name' => 'B202'],
			['name' => 'B203'],
			['name' => 'B204'],
			['name' => 'B205'],
			['name' => 'B206'],
			['name' => 'B207'],
			['name' => 'B208'],
			['name' => 'B209'],
			['name' => 'E101'],// E
			['name' => 'E102'],
			['name' => 'E103'],
			['name' => 'E104'],
			['name' => 'E105'],
			['name' => 'E106'],
			['name' => 'E107'],
			['name' => 'E108'],
			['name' => 'E109'],
			['name' => 'E201'],
			['name' => 'E202'],
			['name' => 'E203'],
			['name' => 'E204'],
			['name' => 'E205'],
			['name' => 'E206'],
			['name' => 'E207'],
			['name' => 'E208'],
			['name' => 'E209'],
			['name' => 'E301'],
			['name' => 'E302'],
			['name' => 'E303'],
			['name' => 'E304'],
			['name' => 'E305'],
			['name' => 'E306'],
			['name' => 'E307'],
			['name' => 'E308'],
			['name' => 'E309'],
			['name' => 'E111'],
			['name' => 'E112'],
			['name' => 'E113'],
			['name' => 'E114'],
			['name' => 'E115'],
			['name' => 'E116'],
			['name' => 'E117'],
			['name' => 'F101'],//F
			['name' => 'F102'],
			['name' => 'F103'],
			['name' => 'F104'],
			['name' => 'F105'],
			['name' => 'F106'],
			['name' => 'F107'],
			['name' => 'F108'],
			['name' => 'F109'],
			['name' => 'F201'],
			['name' => 'F202'],
			['name' => 'F203'],
			['name' => 'F204'],
			['name' => 'F205'],
			['name' => 'F206'],
			['name' => 'F207'],
			['name' => 'F208'],
			['name' => 'F209'],
			['name' => 'F301'],
			['name' => 'F302'],
			['name' => 'F303'],
			['name' => 'F304'],
			['name' => 'F305'],
			['name' => 'F306'],
			['name' => 'F307'],
			['name' => 'F308'],
			['name' => 'F309'],
			['name' => 'F401'],
			['name' => 'F402'],
			['name' => 'F101'],//H
			['name' => 'H102'],
			['name' => 'H103'],
			['name' => 'H104'],
			['name' => 'H105'],
			['name' => 'H106'],
			['name' => 'H107'],
			['name' => 'H108'],
			['name' => 'H109'],
			['name' => 'H201'],
			['name' => 'H202'],
			['name' => 'H203'],
			['name' => 'H204'],
			['name' => 'H205'],
			['name' => 'H206'],
			['name' => 'H207'],
			['name' => 'H208'],
			['name' => 'H209'],
			['name' => 'H301'],
			['name' => 'H302'],
			['name' => 'H303'],
			['name' => 'H304'],
			['name' => 'H305'],
			['name' => 'H306'],
			['name' => 'H307'],
			['name' => 'H308'],
			['name' => 'H309'],
			['name' => 'H401'],
			['name' => 'H402']
		]);
	}
}

class DeviceCatTableSeeder extends Seeder{
	public function run(){
		DB::table('device_cats')->insert([
			['name' => 'Quạt', 'quantity' => '400'],
			['name' => 'Đèn', 'quantity' => '600'],
			['name' => 'Máy chiếu', 'quantity' => '200'],
			['name' => 'Điều hòa', 'quantity' => '100'],
			['name' => 'Remote máy chiếu', 'quantity' => '200'],
			['name' => 'Remote điều hòa', 'quantity' => '80'],
			['name' => 'Ổ cắm điện', 'quantity' => '80'],
			['name' => 'Loa', 'quantity' => '200']
		]);
	}
}

class DeviceLocationTableSeeder extends Seeder{
	public function run(){
		DB::table('device_locations')->insert([
			['name' => 'Gắn liền'],
			['name' => 'Để rời']
		]);
	}
}

class DeviceStatusTableSeeder extends Seeder{
	public function run(){
		DB::table('device_statuses')->insert([
			['name' => 'Sẵn sàng'],
			['name' => 'Đang bận'],
			['name' => 'Bị hỏng']
		]);
	}
}

class PeriodOfClassTableSeeder extends Seeder{
	public function run(){
		DB::table('period_of_classes')->insert([
			['name' => 'Tiết 1', 'timestart' => '07:00', 'timeend' => '07:50'],
			['name' => 'Tiết 2', 'timestart' => '08:00', 'timeend' => '08:50'],
			['name' => 'Tiết 3', 'timestart' => '09:00', 'timeend' => '09:50'],
			['name' => 'Tiết 4', 'timestart' => '10:00', 'timeend' => '10:50'],
			['name' => 'Tiết 5', 'timestart' => '11:00', 'timeend' => '11:50'],
			['name' => 'Tiết 6', 'timestart' => '12:30', 'timeend' => '13:20'],
			['name' => 'Tiết 7', 'timestart' => '13:30', 'timeend' => '14:20'],
			['name' => 'Tiết 8', 'timestart' => '14:30', 'timeend' => '15:20'],
			['name' => 'Tiết 9', 'timestart' => '15:30', 'timeend' => '16:20'],
			['name' => 'Tiết 10', 'timestart' => '16:30', 'timeend' => '17:20'],
			['name' => 'Tiết 11', 'timestart' => '17:30', 'timeend' => '18:20'],
			['name' => 'Tiết 12', 'timestart' => '18:30', 'timeend' => '19:20'],
			['name' => 'Tiết 13', 'timestart' => '19:30', 'timeend' => '20:20'],
			['name' => 'Tiết 14', 'timestart' => '20:30', 'timeend' => '21:20']
		]);
	}
}


