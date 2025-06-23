<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(-45deg, #6a11cb, #2575fc, #ff6a00, #f7971e);
            background-size: 400% 400%;
            animation: gradientBG 12s ease-in-out infinite;
        }
        @keyframes gradientBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }
        .signup-container {
            max-width: 420px;
            margin: 60px auto;
            background: rgba(255,255,255,0.1);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(80,80,180,0.18);
            padding: 38px 32px 32px 32px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.18);
            animation: fadeInUp 1.1s cubic-bezier(.39,.575,.56,1) both;
        }
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(40px) scale(0.98);}
            100% { opacity: 1; transform: translateY(0) scale(1);}
        }
        .signup-container h2 {
            text-align: center;
            margin-bottom: 28px;
            color: #fff;
            letter-spacing: 1px;
            font-size: 2rem;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        label {
            display: block;
            margin-bottom: 7px;
            color: #fff;
            font-weight: 500;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="number"], input[type="url"] {
            width: 100%;
            padding: 10px 40px 10px 12px;
            border: 1.5px solid rgba(255,255,255,0.3);
            border-radius: 6px;
            font-size: 1rem;
            background: rgba(255,255,255,0.1);
            color: #fff;
            transition: border 0.2s, box-shadow 0.2s;
            box-sizing: border-box;
        }
        input:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 2px #6a11cb22;
            outline: none;
        }
        .error {
            color: #ff6b6b;
            font-size: 0.92em;
            margin-top: 3px;
        }
        .signup-btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px #6a11cb22;
            transition: background 0.2s, transform 0.15s;
        }
        .signup-btn:hover {
            background: linear-gradient(90deg, #2575fc 0%, #6a11cb 100%);
            transform: translateY(-2px) scale(1.02);
        }
        .login-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #fff;
            text-decoration: none;
            font-size: 1em;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: color 0.2s;
        }
        .login-link:hover {
            color: #6a11cb;
        }
        .eye-icon {
            position: absolute;
            right: 12px;
            top: 38px;
            width: 22px;
            height: 22px;
            cursor: pointer;
            fill: #b0b0b0;
            transition: fill 0.2s;
            z-index: 2;
        }
        .eye-icon:hover {
            fill: #2575fc;
        }
        @media (max-width: 500px) {
            .signup-container {
                padding: 18px 6vw 24px 6vw;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Create Account</h2>
        <form id="signupForm" method="POST" action="{{ route('register') }}" autocomplete="off">
            @csrf
            {{-- <div class="form-group">
                <label for="user_id">User ID *</label>
                <input type="text" id="user_id" name="user_id" required>
                <div class="error" id="user_id_error">
                    @error('user_id')
                        {{$message}}
                    @enderror
                </div>
            </div> --}}
            <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" id="name" name="name" required>
                <div class="error" id="name_error">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="busuness_name">Business Name *</label>
                <input type="text" id="busuness_name" name="busuness_name" required>
                <div class="error" id="busuness_name_error">
                    @error('busuness_name')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="busuness_website">Business Website *</label>
                <input type="url" id="busuness_website" name="busuness_website" required>
                <div class="error" id="busuness_website_error">
                    @error('busuness_website')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" required>
                <div class="error" id="email_error">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="text" id="phone" name="phone" required>
                <div class="error" id="phone_error">
                    @error('phone')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 22px;">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password" required>
                <svg class="eye-icon" id="togglePassword" viewBox="0 0 24 24">
                    <path d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 12c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8a3 3 0 100 6 3 3 0 000-6z"/>
                </svg>
                <div class="error" id="password_error">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 22px;">
                <label for="password_confirmation">Confirm Password *</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <svg class="eye-icon" id="togglePasswordConfirm" viewBox="0 0 24 24">
                    <path d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 12c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8a3 3 0 100 6 3 3 0 000-6z"/>
                </svg>
                <div class="error" id="password_confirmation_error">
                    @error('password_confirmation')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <button type="submit" class="signup-btn">Register</button>
        </form>
        <a href="/login" class="login-link">Already registered? Login</a>
    </div>
    <script>

        // Password show/hide toggle
        function setupEyeToggle(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            let visible = false;
            icon.addEventListener('click', function() {
                visible = !visible;
                input.type = visible ? 'text' : 'password';
                // Change icon (open/closed eye)
                icon.innerHTML = visible
                    ? '<path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12zm11 3a3 3 0 100-6 3 3 0 000 6z"/><line x1="1" y1="1" x2="23" y2="23" stroke="#b0b0b0" stroke-width="2"/>'
                    : '<path d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 12c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8a3 3 0 100 6 3 3 0 000-6z"/>';
            });
        }
        setupEyeToggle('password', 'togglePassword');
        setupEyeToggle('password_confirmation', 'togglePasswordConfirm');

        // Form validation
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            let valid = true;
            document.querySelectorAll('.error').forEach(el => el.textContent = '');

            ['user_id', 'name', 'busuness_name', 'busuness_website', 'email', 'phone', 'password', 'password_confirmation'].forEach(field => {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    document.getElementById(field + '_error').textContent = 'This field is required';
                    valid = false;
                }
            });

            // Email format
            const email = document.getElementById('email').value.trim();
            if (email && !/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email)) {
                document.getElementById('email_error').textContent = 'Invalid email format';
                valid = false;
            }

            // Password match
            const password = document.getElementById('password').value;
            const password_confirmation = document.getElementById('password_confirmation').value;
            if (password && password_confirmation && password !== password_confirmation) {
                document.getElementById('password_confirmation_error').textContent = 'Passwords do not match';
                valid = false;
            }

            // Dollar rate and current balance validation
            ['dollar_rate', 'current_balance'].forEach(field => {
                const val = document.getElementById(field).value;
                if (val && isNaN(val)) {
                    document.getElementById(field + '_error').textContent = 'Must be a number';
                    valid = false;
                }
            });

            if (!valid) e.preventDefault();
        });
    </script>
</body>
</html>