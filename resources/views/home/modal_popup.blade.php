<!-- Modal Form -->
<div class="ModalForm">
    <div class="modal" id="my-Register">
        <a href="#" class="overlay-close"></a>
        <div class="authen-modal register">
            <h3 class="authen-modal__title">Đăng Kí</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="form-group">
                <label for="name" class="form-label">Họ Tên</label>
                <input id="name" name="name" type="text" required class="form-control">
                <span class="form-message"></span>
                @error('name')
                    <span class="form-message">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Tài khoản Email *</label>
                <input id="email" name="email" type="text" required class="form-control">
                <span class="form-message"></span>
                @error('email')
                    <span class="form-message">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu *</label>
                <input id="password" name="password" required type="password" class="form-control">
                <span class="form-message"></span>
                @error('password')
                    <span class="form-message">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm" class="form-label">Nhập lại mật khẩu *</label>
                <input id="password-confirm" name="password_confirmation" required type="password" class="form-control">
                <span class="form-message"></span>
                @error('password_confirmation')
                    <span class="form-message">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="authen__btns">
                <div class="btn btn--default">
                <button type="submit" class="btn btn-primary">
                    Đăng Kí
                </button>
            </div>
            </div>
            </form>
        </div>
    </div>
    <div class=" modal" id="my-Login">
        <a href="#" class="overlay-close"></a>
        <div class="authen-modal login">
            <h3 class="authen-modal__title">Đăng Nhập</h3>
            <form action="{{ route('login') }}" method="POST">
                @csrf 
            <div class="form-group">
                <label for="email" class="form-label">Địa chỉ email *</label>
                <input id="email" name="email" type="text" class="form-control">
                <span class="form-message"></span>
                @error('email')
                    <span class="form-message">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu *</label>
                <input id="password" name="password" type="password" class="form-control">
                <span class="form-message"></span>
                @error('password')
                    <span class="form-message">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="authen__btns">
                <div class="btn btn--default">
                    <button type="submit" class="btn btn-primary">
                    Đăng nhập
                </button></div>
                <input type="checkbox" class="authen-checkbox" name="remember" id="remember">
                <label class="form-label">Ghi nhớ mật khẩu</label>
            </div>
            <a class="authen__link">Quên mật khẩu ?</a>
        </form>
        </div>
    </div>
    <div class="up-top" id="upTop" onclick="goToTop()">
        <i class="fas fa-chevron-up"></i>
    </div>

</div>