<style>

.container {
  width: 80%;
  margin: 0 auto;
  padding: 1%;
}

.services {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
  margin-bottom: 80px;
}

.service-card {
  width: 300px;
  height: 500px;
  background-color: rgb(222, 229, 231);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  display: flex;
  flex-direction: column;
}

.service-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.service-img {
  height: 250px;
  width: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.service-card:hover .service-img {
  transform: scale(1.05);
}

.service-content {
  padding: 20px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}

.service-content h3 {
  margin-bottom: 10px;
  color: var(--dark);
  transition: color 0.3s ease;
}

.service-card:hover h3 {
  color: var(--primary);
}

.service-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.service-price {
  color: var(--primary);
  font-weight: bold;
  font-size: 1.2rem;
}

.service-rating {
  color: var(--warning);
}

.service-desc {
  color: var(--secondary);
  margin-bottom: 20px;
  line-height: 1.5;
  flex-grow: 1;
}
</style>  
  
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="services">

      @foreach ($products as $product)
      
        <div class="service-card">
          <a href="{{ url('p_image',$product->id) }}">
          <img class="service-img" src="{{ asset($product->image) }}">
          <div class="service-content">
            <h3>{{ $product->title }}</h3>
            <div class="service-meta">
              <div class="service-price">TK.{{ $product->price }}</span></div>

            </div>
            <p class="service-desc">
              {{$product->description}}
            </p>
            </a>
            <a href="#" class="btn btn-primary">Add to Cart</a>

          </div>
        </div> 
        
        @endforeach
      </div>

    </div>
  </section>

<!-- 
                <div class="new">
                <span>
                  New
                </span>
              </div> -->
              <a href=""></a>