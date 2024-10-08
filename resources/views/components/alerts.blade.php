@if ( session('status') )
    <div class="notification received">
        <div class="notification__message message--info" style="display: flex; justify-content: space-between;">
            <p style="margin: 0;">Successful</p>
            <button id="butclose" aria-labelledby="button-dismiss">
                <span id="button-dismiss" hidden>Dismiss</span>
                <svg viewBox="0 0 100 100" width="10" height="10">
                    <g stroke="currentColor" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" fill="none">
                        <g transform="translate(50 50) rotate(45)"><path d="M 0 -30 v 60 z M -30 0 h 60"></path></g>
                    </g>
                </svg>
            </button>
        </div>
    </div>


    <script>
        let notification = document.getElementsByClassName('notification');
        let button = document.getElementById('butclose');
        button.addEventListener('click', function() {
            notification[0].style.display = 'none';
        });
    </script>
    <style>
        /* display the wrapping container in the top right corner of the viewport */
        .notification {
            position: fixed;
            top: 0.5rem;
            right: 1rem;
            /* align the content to the rigth */
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            color: hsl(0, 0%, 20%);
            /* hide the overflow to conceal the message when translated to the right of the container */
            overflow-x: hidden;
            /* padding to avoid cropping the box-shadow on the message */
            padding: 0.25rem;
            z-index: 10000000;
        }

        /* reduce the size of the icon and give a white fill to the elements of the graphic */
        .notification__bell {
            display: block;
            width: 48px;
            height: auto;
            fill: hsl(0, 0%, 100%);
        }
        /* when the .notification container is given a class of .received animate the body and clapper of the bell to swing
        ! animate the clapper with a slight delay as to follow through the animation of the main body
        */
        .notification.received .bell__body {
            animation: swingBody 0.7s 0.02s cubic-bezier(0.455, 0.03, 0.515, 0.955);
        }
        .notification.received .bell__clapper {
            animation: swingClapper 0.7s 0.04s cubic-bezier(0.455, 0.03, 0.515, 0.955);
        }
        /* ! for both elements the rotation occurs using the parent group element as a hinge, allowing for the pendulum-like swing */
        @keyframes swingBody {
            25% {
                transform: rotate(-5deg);
            }
            75% {
                transform: rotate(5deg);
            }
        }
        /* animation for the clapper, following the main body and with a larger rotation */
        @keyframes swingClapper {
            5% {
                transform: rotate(0deg);
            }
            30% {
                transform: rotate(-8deg);
            }
            80% {
                transform: rotate(8deg);
            }
        }

        /* style the content of the message to show a grid with the dismiss button in the top right corner
        |h1  |  button |
        |p   |p        |
        */
        .notification__message {
            display: grid;
            grid-gap: 0.2rem;
            grid-template-columns: 1fr auto;
            padding: 0.5rem 1rem;
            margin: 1rem 0;
            /* style the div as a rounded rectangle with a border on the left segment */
            background: hsl(0, 0%, 100%);
            border-radius: 10px;
            box-shadow: 0 0 5px hsla(0, 0%, 0%, 0.1), 0 2px 3px hsla(0, 0%, 0%, 0.1);
            border-left: 0.5rem solid hsl(0, 0%, 100%);
            /* by default hide the element from sight and include a transition for the chosen properties */
            transform: translateX(100%);
            opacity: 0;
            visibility: hidden;
            transition-property: transform, opacity, visibility;
            transition-duration: 0.7s;
            transition-timing-function: cubic-bezier(0.445, 0.05, 0.55, 0.95);
        }
        .notification__message h1 {
            font-size: 1.1rem;
            font-weight: 500;
            text-transform: capitalize;
        }
        .notification__message p {
            max-width: 320px;
            grid-column: 1/-1;
        }
        .notification__message button {
            background: none;
            border: none;
            color: inherit;
            width: 30px;
            height: 30px;
            grid-column: 2/3;
            grid-row: 1/2;
            align-self: center;
        }
        .notification__message button svg {
            display: block;
            width: 100%;
            height: 100%;
        }

        /* when the .notification container has a class of .received transition the message into view */
        .notification.received .notification__message {
            transform: translateX(0%);
            opacity: 1;
            visibility: visible;
        }
        /* change the border color according to the different modifiers
        ! for each modifier specify also an svg icon in the background, to highlight the message
        */
        .message--info {
            border-left-color: #f7c02d;
            background-repeat: no-repeat;
            background-size: 35px;
            background-position: 100% 100%;
        }
        .message--success {
            border-left-color: hsl(120, 67%, 74%);
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path fill="none" stroke="%2390e990" stroke-width="12" stroke-linejoin="round" stroke-linecap="round" d="M 20 52 l 25 25 l 30 -50"></path></svg>'),
            hsl(0, 0%, 100%);
            background-repeat: no-repeat;
            background-size: 35px;
            background-position: 100% 100%;
        }
        .message--warning {
            border-left-color: hsl(54, 67%, 74%);
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path fill="none" stroke="%23e9e090" stroke-width="12" stroke-linejoin="round" stroke-linecap="round" d="M 50 18 v 40"></path><circle stroke="none" fill="%23e9e090" cx="50" cy="78" r="8"></circle></svg>'),
            hsl(0, 0%, 100%);
            background-repeat: no-repeat;
            background-size: 35px;
            background-position: 100% 100%;
        }
        .message--danger {
            border-left-color: hsl(0, 67%, 74%);
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><g transform="translate(50 50) rotate(45)"><path fill="none" stroke="%23e99090" stroke-width="12" stroke-linejoin="round" stroke-linecap="round" d="M 0 -30 v 60 z M -30 0 h 60"></path></g></svg>'),
            hsl(0, 0%, 100%);
            background-repeat: no-repeat;
            background-size: 35px;
            background-position: 100% 100%;
        }
    </style>
@endif
