@props(['textColor' => '#ffffff'])

<div style="display:flex;justify-content:center;width:100%;margin:15px 0;">

    @if (session()->has('error'))
        <div class="flash-alert flash-error" id="flash-alert-error">
            <div class="flash-content">
                <div class="flash-icon">
                    ✕
                </div>

                <div class="flash-text">
                    <strong>Error!</strong><br>
                    {{ session('error') }}
                </div>

                <button type="button" class="flash-close" data-target="flash-alert-error">
                    &times;
                </button>
            </div>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="flash-alert flash-success" id="flash-alert-success">
            <div class="flash-content">
                <div class="flash-icon">
                    ✓
                </div>

                <div class="flash-text">
                    <strong>Success!</strong><br>
                    {{ session('success') }}
                </div>

                <button type="button" class="flash-close" data-target="flash-alert-success">
                    &times;
                </button>
            </div>
        </div>
    @endif

</div>

<style>
    .flash-alert {
        width: 100%;
        max-width: 700px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
        margin-bottom: 15px;
        animation: flashFade .35s ease;
        font-family: inherit;
    }

    .flash-content {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 18px;
    }

    .flash-success {
        background: #16a34a;
        color: {{ $textColor }};
        border-left: 5px solid #0f7d36;
    }

    .flash-error {
        background: #dc2626;
        color: {{ $textColor }};
        border-left: 5px solid #991b1b;
    }

    .flash-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .18);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        font-weight: bold;
        flex-shrink: 0;
    }

    .flash-text {
        flex: 1;
        line-height: 1.5;
        font-size: 15px;
    }

    .flash-text strong {
        display: block;
        margin-bottom: 3px;
        font-size: 16px;
    }

    .flash-close {
        border: none;
        background: transparent;
        color: inherit;
        font-size: 26px;
        cursor: pointer;
        opacity: .8;
        transition: .2s;
        padding: 0;
        line-height: 1;
    }

    .flash-close:hover {
        opacity: 1;
        transform: scale(1.1);
    }

    @keyframes flashFade {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media(max-width:768px) {

        .flash-content {
            padding: 14px;
            gap: 12px;
        }

        .flash-icon {
            width: 36px;
            height: 36px;
            font-size: 18px;
        }

        .flash-text {
            font-size: 14px;
        }
    }
</style>

<script>
    document.addEventListener('click', function(e) {

        if (!e.target.classList.contains('flash-close')) return;

        const alert = document.getElementById(e.target.dataset.target);

        if (alert) {
            alert.style.transition = 'all .3s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';

            setTimeout(() => {
                alert.remove();
            }, 300);
        }

    });

    // Auto hide after 9 seconds
    setTimeout(() => {
        document.querySelectorAll('.flash-alert').forEach(alert => {
            alert.style.transition = 'all .4s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';

            setTimeout(() => alert.remove(), 400);
        });
    }, 8000);
</script>
