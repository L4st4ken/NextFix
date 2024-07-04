<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NextFix</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #0F171E;
                color: #fff;
                }

                .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px 40px;
                }

                .logo-container {
                flex-grow: 1;
                }
                .login-btn {
                background-color: #E50914;
                color: #fff;
                padding: 10px 30px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                margin-right: 50px;
                }
                .login-btn:hover, .login-btn:focus{
                  color: #000000;
                  text-decoration: none;
                }

                .sign-up-btn {
                background-color: #E50914;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                }
                .sign-up-btn:hover, .sign-up-btn:focus{
                  color: #000000;
                  text-decoration: none;
                }

                .main {
                padding: 40px;
                }

                .hero {
                text-align: center;
                margin-bottom: 40px;
                }

                .hero h1 {
                font-size: 3rem;
                margin-bottom: 10px;
                }

                .hero p {
                font-size: 1.2rem;
                }

                .start-your-free-trial-btn {
                background-color: #E50914;
                color: #fff;
                padding: 15px 30px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                font-size: 1.1rem;
                margin-top: 20px;
                cursor: pointer;
                }
                .start-your-free-trial-btn:hover, .start-your-free-trial-btn:focus{
                  color:#000000;
                  text-decoration: none;
                }

                .content {
                margin-bottom: 40px;
                }

                .content h2 {
                font-size: 2rem;
                margin-bottom: 20px;
                }

                .content-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                grid-gap: 20px;
                }

                .content-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                grid-gap: 20px;
                }

                .content-grid-item {
                display: block; /* Ensures image fills the container */
                text-decoration: none; /* Removes underline from links */
                }

                .content-grid-item img {
                width: 100%;
                height: auto;
                object-fit: cover; /* Scales image to fill container */
                }

                .footer {
                text-align: center;
                padding: 20px;
                background-color: #141414;
                }
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="header">
                        <div class="logo-container">
                          <img width = "100px"src="https://i.pinimg.com/736x/6e/e9/21/6ee92145d49b98d6f9c0b1545e574c05.jpg" alt="Netflix Logo">
                        </div>
                        <?php if(Route::has('login')): ?>
                            <nav class="-mx-3 flex flex-1 justify-end">
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(Auth::user()->usertype === 'admin'): ?>
                                        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="sign-up-btn">Dashboard</a>
                                        
                                    <?php endif; ?>
                                    <?php if(Auth::user()-> usertype ==='staff'): ?>
                                      <a href="<?php echo e(url('/staff/dashboard')); ?>" class="sign-up-btn">Dashboard</a>
                                        
                                    <?php else: ?>
                                    <a href="<?php echo e(url('/dashboard')); ?>" class="sign-up-btn">Dashboard</a>
                                    <?php endif; ?>
                                    
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>" class="login-btn">Login</a>
                        

                                    <?php if(Route::has('register')): ?>
                                        <a href="<?php echo e(route('register')); ?>" class="sign-up-btn">Sign Up</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </nav>
                        <?php endif; ?>
                      </header>

                    <main class="main">
                        <section class="hero">
                          <h1>See what's next</h1>
                          <p>Watch anywhere. Cancel anytime.</p>
                          <a href="#" class="start-your-free-trial-btn">Start your free trial</a>
                        </section>
                        <section class="content">
                          <h2>Popular on NextFix</h2>
                          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <div class="content-grid">
                                  <a href="#" class="content-grid-item">
                                    <img src="https://image.tmdb.org/t/p/w185/2zmTngn1tYC1AvfnrFLhxeD82hz.jpg" alt="Movie/Show Title">
                                  </a>
                                  <a href="#" class="content-grid-item">
                                    <img src="https://image.tmdb.org/t/p/w185/luoKpgVwi1E5nQsi7W0UuKHu2Rq.jpg" alt="Movie/Show Title">
                                  </a>
                                  <a href="#" class="content-grid-item">
                                    <img src="https://image.tmdb.org/t/p/w185/t9XkeE7HzOsdQcDDDapDYh8Rrmt.jpg" alt="Movie/Show Title">
                                  </a>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                <div class="content-grid">
                                  <a href="#" class="content-grid-item">
                                    <img src="https://upload.wikimedia.org/wikipedia/id/f/f7/Inside_Out_2_poster.jpg" alt="Movie/Show Title">
                                  </a>
                                  <a href="#" class="content-grid-item">
                                    <img src="https://upload.wikimedia.org/wikipedia/en/7/76/Fallout_%282024_TV_series%29.jpg" alt="Movie/Show Title">
                                  </a>
                                  <a href="#" class="content-grid-item">
                                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/0/0d/Civil_War_2024_film_poster.jpeg/220px-Civil_War_2024_film_poster.jpeg" alt="Movie/Show Title">
                                  </a>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <div class="content-grid">
                                  <a href="#" class="content-grid-item">
                                    <img src="https://lumiere-a.akamaihd.net/v1/images/the-acolyte-poster-streaming-catalog_b0753dcc_82e2dfad.jpeg" alt="Movie/Show Title">
                                  </a>
                                  <a href="#" class="content-grid-item">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-FyucTvf3NXx6rm7rhU7h_4ISnOAFYANJzw&s" alt="Movie/Show Title">
                                  </a>
                                  <a href="#" class="content-grid-item">
                                    <img src="https://m.media-amazon.com/images/I/61W-KI4mR6L._AC_UF894,1000_QL80_.jpg" alt="Movie/Show Title">
                                  </a>
                                </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                        </section>
                      </main>
                    
                      <footer class="footer">
                        <p>&copy; 2024 NextFix, Inc.</p>
                      </footer>
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\Evan\fake3-app\resources\views/welcome.blade.php ENDPATH**/ ?>