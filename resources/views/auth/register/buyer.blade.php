@extends('layouts.guest')

@section('content')
    <style>
        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        .blink {
            animation: blink 1s steps(5, start) infinite;
        }

        .no-blink {
            animation: none;
        }
    </style>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <div class="col-lg-5">
        <div class="card-group d-md-flex row ">
            <div class="card col-md-7 p-4 mb-0 rounded-5">
                <div class="card-header d-flex justify-content-center">
                    <img src="{{ asset('icons/sangpum-logo-removebg-preview.png') }}" alt="">
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="role" value="buyer">
                                <!-- Stepper indicators -->
                                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist" hidden>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="step1-tab" data-bs-toggle="pill"
                                            data-bs-target="#step1" type="button" role="tab" aria-controls="step1"
                                            aria-selected="true">Step 1</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="step2-tab" data-bs-toggle="pill"
                                            data-bs-target="#step2" type="button" role="tab" aria-controls="step2"
                                            aria-selected="false">Step
                                            2</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="step3-tab" data-bs-toggle="pill"
                                            data-bs-target="#step3" type="button" role="tab" aria-controls="step3"
                                            aria-selected="false">Step
                                            3</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="step4-tab" data-bs-toggle="pill"
                                            data-bs-target="#step4" type="button" role="tab" aria-controls="step4"
                                            aria-selected="false">Step
                                            3</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="step5-tab" data-bs-toggle="pill"
                                            data-bs-target="#step5" type="button" role="tab" aria-controls="step5"
                                            aria-selected="false">Step
                                            3</button>
                                    </li>
                                </ul>
                                <!-- Stepper content -->
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="step1" role="tabpanel"
                                        aria-labelledby="step1-tab">
                                        <div class="d-flex flex-column" style="text-align: center;">
                                            <h1 class="font-weight: 900;">{{ __('Sign up') }}</h1>
                                            <p>Create an Account</p>
                                            <div class="input-group mb-3">
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    name="username" placeholder="{{ __('Username') }}" required autofocus>
                                                <div class="invalid-feedback" id="usernameError"></div>
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" placeholder="{{ __('Password') }}" required autofocus
                                                    id="password">
                                                <button class="btn btn-outline-secondary toggle-password" type="button"
                                                    data-input="password">
                                                    <i class="fas fa-eye password-eye-icon no-blink"></i>
                                                </button>
                                                <div class="invalid-feedback" id="passwordError"></div>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="d-flex mt-2">
                                                <p style="font-size: 12px;">Take Note : Ensure your password includes at
                                                    least one uppercase and numeric.</p>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation"
                                                    placeholder="{{ __('Confirm Password') }}" required
                                                    id="password_confirmation">
                                                <button class="btn btn-outline-secondary toggle-password" type="button"
                                                    data-input="password_confirmation">
                                                    <i class="fas fa-eye password-eye-icon no-blink"></i>
                                                </button>
                                                <div class="invalid-feedback" id="confirmPasswordError"></div>
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group mb-3">
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    type="text" name="email" placeholder="{{ __('Email') }}"
                                                    required autofocus>
                                                <div class="invalid-feedback" id="emailError"></div>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <button class="btn rounded-5 w-100 next-btn" type="button"
                                                data-next="step2-tab"
                                                style="background:#55AAAD; color:white; font-weight: bold">{{ __('Next') }}</button>
                                        </div>

                                        <div class="input-group mt-4 d-flex justify-content-center">
                                            <p>Already have Account? <a href="{{ route('login.buyer') }}">Login</a></p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step2" role="tabpanel"
                                        aria-labelledby="step2-tab">
                                        <div class="d-flex flex-column" style="text-align: center;">
                                            <h2 class="font-weight: 500;">{{ __('Personal Information') }}</h2>
                                            <div class="input-group mt-3">
                                                <input type="text"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    name="first_name" placeholder="{{ __('First Name') }}" required
                                                    autofocus>
                                                <div class="invalid-feedback" id="firstNameError"></div>
                                                @error('first_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group mt-3">
                                                <input type="text"
                                                    class="form-control @error('middle_name') is-invalid @enderror"
                                                    name="middle_name" placeholder="{{ __('Middle Name') }}" required
                                                    autofocus>
                                                <div class="invalid-feedback" id="middleNameError"></div>
                                                @error('middle_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group mt-3 mb-3">
                                                <input type="text"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    name="last_name" placeholder="{{ __('Last Name') }}" required
                                                    autofocus>
                                                <div class="invalid-feedback" id="lastNameError"></div>
                                                @error('last_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <label for="">Birth Date(Must be 18 years old or above)</label>
                                            <div class="input-group mt-3">
                                                <input type="date"
                                                    class="form-control @error('birth_date') is-invalid @enderror"
                                                    name="birth_date" placeholder="Birth Date" required autofocus>
                                                <div class="invalid-feedback" id="birthDateError"></div>
                                                @error('birth_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-type mt-3">
                                                <label for="" class="mb-1">Add Profile Picture(Optional)</label>
                                                <input type="file" class="form-control" name="profile">
                                            </div>
                                            <div class="invalid-feeback" id="profilePicError"></div>
                                            <div class="input-group mt-3">
                                                <button class="btn rounded-5 w-100 next-btn" type="button"
                                                    data-next="step3-tab"
                                                    style="background:#55AAAD; color:white; font-weight: bold">{{ __('Next') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step3" role="tabpanel"
                                        aria-labelledby="step3-tab">
                                        <div class="d-flex flex-column" style="text-align: center;">
                                            <h2 class="font-weight: 500;">{{ __('Personal Information') }}</h2>
                                            <div class="input-group mt-3">
                                                <input type="text"
                                                    class="form-control @error('nickname') is-invalid @enderror"
                                                    name="nickname" placeholder="{{ __('What is your Nickname?') }}"
                                                    required autofocus>
                                                <div class="invalid-feedback" id="nicknameError"></div>
                                                @error('nickname')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group mt-3">
                                                <input type="text"
                                                    class="form-control @error('astr_sign') is-invalid @enderror"
                                                    name="astr_sign"
                                                    placeholder="{{ __('What is your astrological sign?') }}" required
                                                    autofocus>
                                                <div class="invalid-feedback" id="astrologicalSignError"></div>
                                                @error('astr_sign')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group mt-3">
                                                <input type="text"
                                                    class="form-control @error('kpop_group') is-invalid @enderror"
                                                    name="kpop_group"
                                                    placeholder="{{ __('What is your favorite k-pop group?') }}" required
                                                    autofocus>
                                                <div class="invalid-feedback" id="favKpopError"></div>
                                                @error('kpop_group')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group mt-3">
                                                <input type="text"
                                                    class="form-control @error('bias') is-invalid @enderror"
                                                    name="bias"
                                                    placeholder="{{ __('Who is your first k-pop bias?') }}" required
                                                    autofocus>
                                                <div class="invalid-feedback" id="biasKpopError"></div>
                                                @error('bias')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group mt-3">
                                                <button class="btn rounded-5 w-100 next-btn" type="button"
                                                    data-next="step4-tab"
                                                    style="background:#55AAAD; color:white; font-weight: bold">{{ __('Next') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step4" role="tabpanel"
                                        aria-labelledby="step4-tab">
                                        <div class="d-flex flex-column" style="text-align: center;">
                                            <h2 class="font-weight: 500;">{{ __('Personal Information') }}</h2>
                                            <div class="input-group mt-3">
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" placeholder="{{ __('Address') }}" autofocus>
                                                <div class="invalid-feedback" id="addressError"></div>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group mt-3">
                                                <input type="number"
                                                    class="form-control @error('barangay') is-invalid @enderror"
                                                    name="barangay" placeholder="{{ __('ZIP code') }}" autofocus>
                                                <div class="invalid-feedback" id="zipcodeError"></div>
                                                @error('barangay')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group mt-3">
                                                <select name="govt_type" id="" class="form-select">
                                                    <option value="" selected disabled>Select Type Of Govt. ID
                                                    </option>
                                                    <option value="UMID">UMID</option>
                                                    <option value="Driver's License">Driver's License</option>
                                                    <option value="Philhealth Card">Philhealth Card</option>
                                                    <option value="SSS ID">SSS ID</option>
                                                    <option value="Passport ID">Passport ID</option>
                                                    <option value="National ID">National ID</option>
                                                    <option value="Other ID">Other ID</option>
                                                </select>
                                                <div class="invalid-feedback" id="govtTypeError"></div>
                                                @error('govt_type')
                                                    <span class="invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mt-3 mb-2">Upload your Govt. ID</div>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="govt_id" required>
                                                <div class="invalid-feedback" id="govtIdError"></div>
                                            </div>
                                            <div class="input-group mt-3">
                                                <button class="btn rounded-5 w-100 next-btn" type="button"
                                                    data-next="step5-tab"
                                                    style="background:#55AAAD; color:white; font-weight: bold">{{ __('Submit') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step5" role="tabpanel"
                                        aria-labelledby="step6-tab">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="container">
                                                <div class="d-flex  flex-column align-items-center">
                                                    <img src="{{ asset('icons/verify.png') }}" alt=""
                                                        width="120" height="120">
                                                    <h3>We're verifying your account!</h3>
                                                    <p>Please expect an Email within 1-2 hour/s on the status of your
                                                        verification.</p>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col d-flex justify-content-center">
                                                        <button class="btn rounded-5 w-50" type="submit"
                                                            data-next="step6-tab"
                                                            style="background:#55AAAD; color:white; font-weight: bold;">{{ __('Done') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {

                document.querySelectorAll('.toggle-password').forEach(button => {
                    button.addEventListener('click', (e) => {
                        const buttonElement = e.target.tagName === 'I' ? e.target.parentNode : e.target;
                        const inputId = buttonElement.getAttribute('data-input');
                        const input = document.getElementById(inputId);
                        const eyeIcon = buttonElement.querySelector('.password-eye-icon');
                        if (input.type === 'password') {
                            input.type = 'text';
                            eyeIcon.classList.remove('fa-eye', 'no-blink');
                            eyeIcon.classList.add('fa-eye-slash', 'blink');
                        } else {
                            input.type = 'password';
                            eyeIcon.classList.remove('fa-eye-slash', 'blink');
                            eyeIcon.classList.add('fa-eye', 'no-blink');
                        }
                    });
                });
                // Add click event on all 'Next' buttons
                document.querySelectorAll('.next-btn').forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.preventDefault(); // Prevent default button action
                        const currentStep = e.target.closest('.tab-pane');
                        let valid = true;

                        // Clear previous error messages and remove 'is-invalid' class from all form controls
                        currentStep.querySelectorAll('.invalid-feedback').forEach(div => div
                            .textContent = '');
                        currentStep.querySelectorAll('.form-control').forEach(input => input.classList
                            .remove('is-invalid'));

                        // Validation for step 1 inputs, if you're on step 1
                        if (currentStep.id === 'step1') {
                            const username = currentStep.querySelector('input[name="username"]');
                            const email = currentStep.querySelector('input[name="email"]');
                            const password = currentStep.querySelector('input[name="password"]');
                            const confirmPassword = currentStep.querySelector(
                                'input[name="password_confirmation"]');
                            const usernameError = currentStep.querySelector('#usernameError');
                            const emailError = currentStep.querySelector('#emailError');
                            const passwordError = currentStep.querySelector('#passwordError');
                            const confirmPasswordError = currentStep.querySelector(
                                '#confirmPasswordError');

                            // Clear previous error messages and remove 'is-invalid' class
                            usernameError.textContent = '';
                            emailError.textContent = '';
                            passwordError.textContent = '';
                            confirmPasswordError.textContent = '';
                            username.classList.remove('is-invalid');
                            email.classList.remove('is-invalid');
                            password.classList.remove('is-invalid');
                            confirmPassword.classList.remove('is-invalid');

                            // Validate the username
                            if (!username.value.trim()) {
                                usernameError.textContent = 'Username is required.';
                                username.classList.add('is-invalid');
                                valid = false;
                            }

                            // Validate the email
                            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!email.value.trim()) {
                                emailError.textContent = 'Email is required.';
                                email.classList.add('is-invalid');
                                valid = false;
                            } else if (!emailPattern.test(email.value.trim())) {
                                emailError.textContent = 'Please enter a valid email address.';
                                email.classList.add('is-invalid');
                                valid = false;
                            }

                            // Validate the password
                            if (!password.value) {
                                passwordError.textContent = 'Password is required.';
                                password.classList.add('is-invalid');
                                valid = false;
                            } else if (password.value.length < 8) {
                                passwordError.textContent = 'Password must be at least 8 characters.';
                                password.classList.add('is-invalid');
                                valid = false;
                            } else if (!/[A-Z]/.test(password.value)) {
                                passwordError.textContent =
                                    'Password must contain at least one uppercase letter.';
                                password.classList.add('is-invalid');
                                valid = false;
                            } else if (!/[0-9]/.test(password.value)) {
                                passwordError.textContent =
                                    'Password must contain at least one number.';
                                password.classList.add('is-invalid');
                                valid = false;
                            }

                            // Validate the confirm password
                            if (confirmPassword.value !== password.value) {
                                confirmPasswordError.textContent = 'Passwords do not match.';
                                confirmPassword.classList.add('is-invalid');
                                valid = false;
                            }
                        }

                        // Validation for step 2 inputs, if you're on step 2
                        if (currentStep.id === 'step2') {
                            const firstName = currentStep.querySelector('input[name="first_name"]');
                            const middleName = currentStep.querySelector('input[name="middle_name"]');
                            const lastName = currentStep.querySelector('input[name="last_name"]');
                            const birthDate = currentStep.querySelector('input[name="birth_date"]');
                            const firstNameError = currentStep.querySelector('#firstNameError');
                            const middleNameError = currentStep.querySelector('#middleNameError');
                            const lastNameError = currentStep.querySelector('#lastNameError');
                            const birthDateError = currentStep.querySelector('#birthDateError');
                            let profilePic = currentStep.querySelector('input[name="profile"]');
                            let profilePicError = currentStep.querySelector('#profilePicError');

                            if (profilePic.files.length > 0) {
                                let file = profilePic.files[0];
                                let fileType = file.type;
                                const validTypes = ['image/jpeg',
                                    'image/png'
                                ]; // Add or remove file types as needed
                                let fileSize = file.size;
                                const maxSize = 2 * 1024 * 1024; // Example: 2MB max size

                                // Validate file type
                                if (!validTypes.includes(fileType)) {
                                    profilePicError.textContent =
                                        'Invalid file type. Only JPEG and PNG are allowed.';
                                    profilePic.classList.add('is-invalid');
                                    valid = false;
                                }
                                // Validate file size
                                else if (fileSize > maxSize) {
                                    profilePicError.textContent =
                                        'The file is too large. Maximum size allowed is 2MB.';
                                    profilePic.classList.add('is-invalid');
                                    valid = false;
                                } else {
                                    profilePic.classList.remove('is-invalid');
                                }
                            } else {
                                // If no file is selected, clear any previous error messages
                                profilePic.classList.remove('is-invalid');
                                if (profilePicError) {
                                    profilePicError.textContent = '';
                                }
                            }


                            // Validate the first name
                            if (!firstName.value.trim()) {
                                firstNameError.textContent = 'First name is required.';
                                firstName.classList.add('is-invalid');
                                valid = false;
                            }

                            // Validate the middle name
                            if (!middleName.value.trim()) {
                                middleNameError.textContent = 'Middle name is required.';
                                middleName.classList.add('is-invalid');
                                valid = false;
                            }

                            // Validate the last name
                            if (!lastName.value.trim()) {
                                lastNameError.textContent = 'Last name is required.';
                                lastName.classList.add('is-invalid');
                                valid = false;
                            }

                            // Validate the birth date
                            if (!birthDate.value.trim()) {
                                birthDateError.textContent = 'Birth date is required.';
                                birthDate.classList.add('is-invalid');
                                valid = false;
                            } else {
                                let birthDateValue = new Date(birthDate.value);
                                let currentDate = new Date();
                                let age = currentDate.getFullYear() - birthDateValue.getFullYear();
                                let m = currentDate.getMonth() - birthDateValue.getMonth();
                                if (m < 0 || (m === 0 && currentDate.getDate() < birthDateValue.getDate())) {
                                    age--;
                                }

                                if (age < 18) {
                                    birthDateError.textContent = 'You must be at least 18 years old.';
                                    birthDate.classList.add('is-invalid');
                                    valid = false;
                                }
                            }
                        }
                        if (currentStep.id === 'step3') {
                            const nickname = currentStep.querySelector('input[name="nickname"]');
                            const astrologicalSign = currentStep.querySelector(
                                'input[name="astr_sign"]');
                            const favKpop = currentStep.querySelector('input[name="kpop_group"]');
                            const biasKpop = currentStep.querySelector('input[name="bias"]');
                            const nicknameError = currentStep.querySelector('#nicknameError');
                            const astrologicalSignError = currentStep.querySelector(
                                '#astrologicalSignError');
                            const favKpopError = currentStep.querySelector('#favKpopError');
                            const biasKpopError = currentStep.querySelector('#biasKpopError');

                            // Clear previous error messages
                            nicknameError.textContent = '';
                            astrologicalSignError.textContent = '';
                            favKpopError.textContent = '';
                            biasKpopError.textContent = '';

                            // Validate the nickname
                            if (!nickname.value.trim()) {
                                nicknameError.textContent =
                                    'What is your nickname? This field is required.';
                                nickname.classList.add('is-invalid');
                                valid = false;
                            } else {
                                nickname.classList.remove('is-invalid');
                            }

                            // Validate the astrological sign
                            if (!astrologicalSign.value.trim()) {
                                astrologicalSignError.textContent =
                                    'What is your astrological sign? This field is required.';
                                astrologicalSign.classList.add('is-invalid');
                                valid = false;
                            } else {
                                astrologicalSign.classList.remove('is-invalid');
                            }

                            // Validate the favorite k-pop group
                            if (!favKpop.value.trim()) {
                                favKpopError.textContent =
                                    'What is your favorite k-pop group? This field is required.';
                                favKpop.classList.add('is-invalid');
                                valid = false;
                            } else {
                                favKpop.classList.remove('is-invalid');
                            }

                            // Validate the first k-pop bias
                            if (!biasKpop.value.trim()) {
                                biasKpopError.textContent =
                                    'Who is your first k-pop bias? This field is required.';
                                biasKpop.classList.add('is-invalid');
                                valid = false;
                            } else {
                                biasKpop.classList.remove('is-invalid');
                            }
                        }
                        if (currentStep.id === 'step4') {
                            const address = currentStep.querySelector('input[name="address"]');
                            const zipcode = currentStep.querySelector('input[name="barangay"]');
                            const govtType = currentStep.querySelector('select[name="govt_type"]');
                            const addressError = currentStep.querySelector('#addressError');
                            const zipcodeError = currentStep.querySelector('#zipcodeError');
                            const govtTypeError = currentStep.querySelector('#govtTypeError');
                            let govtId = currentStep.querySelector('input[name="govt_id"]');
                            let govtIdError = currentStep.querySelector('#govtIdError');

                            // Clear previous error messages
                            addressError.textContent = '';
                            zipcodeError.textContent = '';
                            govtTypeError.textContent = '';

                            // Validate the address
                            if (!address.value.trim()) {
                                addressError.textContent = 'Address is required.';
                                address.classList.add('is-invalid');
                                valid = false;
                            } else {
                                address.classList.remove('is-invalid');
                            }

                            // Validate the zipcode
                            if (!zipcode.value.trim()) {
                                zipcodeError.textContent = 'ZIP code is required.';
                                zipcode.classList.add('is-invalid');
                                valid = false;
                            } else {
                                zipcode.classList.remove('is-invalid');
                            }
                            // Validate the government ID type
                            if (!govtType.value || govtType.value.trim() === '') {
                                govtTypeError.textContent = 'You must select a type of Government ID.';
                                govtType.classList.add('is-invalid');
                                valid = false;
                            } else {
                                govtType.classList.remove('is-invalid');
                            }

                            if (!govtId.files.length) {
                                govtIdError.textContent = 'Government ID is required.';
                                govtId.classList.add('is-invalid');
                                valid = false;
                            } else {
                                // Check for file type, for example, if you only allow .jpg or .png files
                                let fileType = govtId.files[0].type;
                                const validTypes = ['image/jpeg', 'image/png'];
                                if (!validTypes.includes(fileType)) {
                                    govtIdError.textContent =
                                        'Invalid file type. Allowed types are .jpg and .png.';
                                    govtId.classList.add('is-invalid');
                                    valid = false;
                                } else {
                                    // Optionally check for file size, for example, if you want to limit the size to 2MB
                                    let fileSize = govtId.files[0].size;
                                    const maxSize = 2 * 1024 * 1024; // 2MB
                                    if (fileSize > maxSize) {
                                        govtIdError.textContent =
                                            'The file is too large. Maximum size allowed is 2MB.';
                                        govtId.classList.add('is-invalid');
                                        valid = false;
                                    } else {
                                        govtId.classList.remove('is-invalid');
                                    }
                                }
                            }
                        }

                        if (valid) {
                            // If all validations pass, proceed to the next step
                            const nextId = e.target.getAttribute('data-next');
                            const nextTab = document.querySelector(`#${nextId}`);
                            if (nextTab) {
                                new bootstrap.Tab(nextTab)
                                    .show(); // Activate the next tab using Bootstrap's Tab plugin
                            }
                        } else {
                            // If there are errors, focus the first invalid input
                            currentStep.querySelector('.is-invalid').focus();
                        }
                    });
                });
            });
        </script>
    @endsection
