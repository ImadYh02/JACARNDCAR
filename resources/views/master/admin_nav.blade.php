<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        {{-- <ion-icon name="logo-apple"></ion-icon> --}}
                    </span>
                    <span class="title">BigCar</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.home') }}">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.customers') }}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Customers</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.cars') }}">
                    <span class="icon">
                        <ion-icon name="car"></ion-icon>
                    </span>
                    <span class="title">Cars</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.orders') }}">
                    <span class="icon">
                        <ion-icon name="card"></ion-icon>
                    </span>
                    <span class="title">Contrats</span>
                </a>
            </li>

            {{-- <li>
                <a href="{{ route('admin.coupons') }}">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Coupons</span>
                </a>
            </li> --}}

            <li>
                <a href="{{ route('admin.categories') }}">
                    <span class="icon">
                        <ion-icon name="keypad"></ion-icon>
                    </span>
                    <span class="title">Categories</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.locations') }}">
                    <span class="icon">
                        <ion-icon name='location'></ion-icon>
                    </span>
                    <span class="title">Locations</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.cars_opp') }}">
                    <span class="icon">
                        <ion-icon name="cog"></ion-icon>
                    </span>
                    <span class="title">Car Opperations</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/logout') }}">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign Out</span>

                </a>
            </li>
        </ul>
    </div>
</div>
