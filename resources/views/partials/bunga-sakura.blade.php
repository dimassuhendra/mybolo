<div class="absolute inset-0 overflow-hidden pointer-events-none opacity-60 z-0">
    @for ($i = 0; $i < 15; $i++)
        <div class="sakura"
            style="left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 8) }}s; animation-duration: {{ rand(7, 12) }}s;">
            <svg width="25" height="25" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path fill="#FFB7C5"
                    d="M256,0C256,0,220,100,160,140C100,180,0,160,0,160C0,160,50,256,120,280C50,304,0,400,0,400C0,400,100,380,160,420C220,460,256,512,256,512C256,512,292,460,352,420C412,380,512,400,512,400C512,400,462,304,392,280C462,256,512,160,512,160C512,160,412,180,352,140C292,100,256,0,256,0Z" />
                <path fill="#F06292" opacity="0.4"
                    d="M256,280 L256,150 M256,280 L160,200 M256,280 L352,200 M256,280 L180,380 M256,280 L332,380" />
            </svg>
        </div>
    @endfor
</div>

<style>
    .sakura {
        position: absolute;
        top: -10%;
        filter: drop-shadow(0 0 5px rgba(255, 183, 197, 0.4));
        /* Efek glowing tipis */
        animation: fallScroll linear infinite;
    }

    @keyframes fallScroll {
        0% {
            transform: translateY(0) translateX(0) rotate(0deg);
            opacity: 0;
        }

        10% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            transform: translateY(100vh) translateX(100px) rotate(720deg);
            opacity: 0;
        }
    }
</style>
