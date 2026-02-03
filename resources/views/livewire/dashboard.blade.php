\<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MiniStock | Intelligent Warehouse Automation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* KEEP YOUR CSS EXACTLY AS IS */
        {!! file_get_contents(public_path('css/dashboard-inline.css')) !!}
    </style>
</head>
<body>

<div id="toast-container"></div>

<header>
    <div class="logo">
        <i class="fa-solid fa-boxes-stacked"></i> MiniStock
    </div>
    <nav>
        <ul>
            <li><a href="#features">Features</a></li>
            <li><a href="#preview">Live Demo</a></li>
            <li><a href="#pricing">Pricing</a></li>
        </ul>
    </nav>
    <a href="{{ url('/login') }}" class="cta-btn">Logout</a>
</header>

<section class="hero">
    <div class="hero-text">
        <h1>Automate Your Warehouse in Seconds.</h1>
        <p>MiniStock brings the power of AI to inventory management.</p>
        <div style="display:flex;gap:15px;">
            <button class="cta-btn" onclick="showToast('Free Trial Started!')">Start Free Trial</button>
            <button class="cta-btn" style="background:transparent;border:1px solid var(--primary-blue);" onclick="showToast('Video Modal Opened')">
                <i class="fa-solid fa-play"></i> Watch Demo
            </button>
        </div>
    </div>

    <div class="hero-visual">
        <div class="warehouse-container">
            <div class="status-panel">
                <div id="scan-log">System Ready...</div>
            </div>
            <div class="scanner"></div>
            <div id="conveyor-container">
                <div class="conveyor-belt"></div>
            </div>
        </div>
    </div>
</section>

<section class="features" id="features">
    <div class="section-header fade-scroll">
        <h2>Powerful Features</h2>
        <p style="color: var(--text-muted);">Everything you need to run a modern warehouse.</p>
    </div>

    <div class="feature-grid">
        <div class="feature-card fade-scroll">
            <div class="icon-box"><i class="fa-solid fa-barcode"></i></div>
            <h3>Smart Scanning</h3>
            <p>Instantly identify and log inventory items.</p>
        </div>
        <div class="feature-card fade-scroll">
            <div class="icon-box"><i class="fa-solid fa-chart-line"></i></div>
            <h3>Real-Time Analytics</h3>
            <p>Predict shortages before they happen.</p>
        </div>
        <div class="feature-card fade-scroll">
            <div class="icon-box"><i class="fa-solid fa-truck-fast"></i></div>
            <h3>Order Automation</h3>
            <p>Automatically reorder stock.</p>
        </div>
    </div>
</section>

<section class="dashboard-preview" id="preview">
    <div class="section-header fade-scroll">
        <h2>Live Dashboard Preview</h2>
    </div>

    <div class="dash-container fade-scroll">
        <div class="dash-header">
            <div class="window-dots">
                <div class="dot red"></div>
                <div class="dot yellow"></div>
                <div class="dot green"></div>
            </div>
        </div>
        <div class="dash-body">
            <div class="dash-sidebar">
                <div class="dash-nav-item active" onclick="switchTab('overview', this)">
                    <i class="fa-solid fa-gauge-high"></i>
                </div>
                <div class="dash-nav-item" onclick="switchTab('inventory', this)">
                    <i class="fa-solid fa-box"></i>
                </div>
                <div class="dash-nav-item" onclick="switchTab('settings', this)">
                    <i class="fa-solid fa-gear"></i>
                </div>
            </div>

            <div class="dash-content">
                <div id="overview" class="content-panel active">
                    <div class="stat-row">
                        <div class="stat-card">
                            <div class="stat-label">Total Stock</div>
                            <div class="stat-value" id="count-stock">0</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Alerts</div>
                            <div class="stat-value" id="count-alerts">0</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Efficiency</div>
                            <div class="stat-value" id="count-eff">0%</div>
                        </div>
                    </div>

                    <div class="chart-container">
                        <div class="bar" data-val="Mon" style="--h:40%"></div>
                        <div class="bar" data-val="Tue" style="--h:65%"></div>
                        <div class="bar" data-val="Wed" style="--h:30%"></div>
                        <div class="bar" data-val="Thu" style="--h:85%"></div>
                        <div class="bar" data-val="Fri" style="--h:55%"></div>
                        <div class="bar" data-val="Sat" style="--h:20%"></div>
                        <div class="bar" data-val="Sun" style="--h:45%"></div>
                    </div>
                </div>

                <div id="inventory" class="content-panel">
                    <h3>Inventory</h3>
                </div>

                <div id="settings" class="content-panel">
                    <h3>Settings</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div style="text-align:center;padding:40px;">
        <p style="color: var(--text-muted);">© {{ date('Y') }} MiniStock</p>
    </div>
</footer>

<script>
const conveyorContainer = document.getElementById('conveyor-container');
const scanLog = document.getElementById('scan-log');

function createBox() {
    const box = document.createElement('div');
    box.classList.add('box');

    const icons = ['fa-box','fa-cube','fa-database','fa-microchip'];
    const randomIcon = icons[Math.floor(Math.random()*icons.length)];
    box.innerHTML = `<i class="fa-solid ${randomIcon}"></i>`;

    box.style.left = '-60px';

    const duration = 4000 + Math.random()*2000;
    box.animate([{transform:'translateX(0)'},{transform:`translateX(${conveyorContainer.offsetWidth+100}px)`}],{
        duration:duration,easing:'linear',fill:'forwards'
    });

    conveyorContainer.appendChild(box);

    setTimeout(()=>{
        scanLog.innerText = `Scanning SKU-${Math.floor(Math.random()*10000)}`;
    }, duration/2);

    setTimeout(()=>box.remove(),duration);
}
setInterval(createBox,1500);

function switchTab(id, el){
    document.querySelectorAll('.dash-nav-item').forEach(e=>e.classList.remove('active'));
    el.classList.add('active');
    document.querySelectorAll('.content-panel').forEach(p=>p.classList.remove('active'));
    document.getElementById(id).classList.add('active');
}

function showToast(msg){
    const c=document.getElementById('toast-container');
    const t=document.createElement('div');
    t.className='toast';
    t.innerHTML=`<i class="fa-solid fa-check"></i> ${msg}`;
    c.appendChild(t);
    setTimeout(()=>t.remove(),3000);
}
</script>

</body>
</html>
