<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
   
    <url>
          <loc><?php echo base_url()."marken" ?></loc>
          <changefreq>daily</changefreq>
          <priority>1</priority>    
    </url>
    <?php foreach($brands as $brand) { 
        
      $brand_name = $brand['name'];
      $brand_name_array = explode(" ",$brand_name);
        if(count($brand_name_array) > 1){
            $brand_name = str_replace(' ', '-', $brand_name);
        }

    ?>
    
    <url>
        <loc><?php echo base_url()."marken/".$brand_name ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
       
    </url>
    <?php } ?> 

    <?php foreach($all_brands_pages as $all_bra) { 
        
        $brand_page = $all_bra['name'];
        $brand_name_array = explode(" ",$brand_page);
          if(count($brand_name_array) > 1){
              $brand_page = str_replace(' ', '-', $brand_page);
          }
  
      ?>
      
      <url>
          <loc><?php echo base_url().$brand_page ?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
         
      </url>
      <?php } ?> 
      <url>
          <loc><?php echo base_url()."home/brands/letter/A"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/B"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/C"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/D"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/E"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/F"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/G"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/H"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/I"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/J"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/K"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/L"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/M"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/N"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/O"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/P"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/Q"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/R"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/S"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/T"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/U"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/V"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/W"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/X"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/Y"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/Z"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/brands/letter/0-9"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
    <url>
          <loc><?php echo base_url()."kategorien"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
    <?php foreach($categories as $categorie) { 
        
        $categories_id = $categorie['categories_id'];
 
  
      ?>
      <url>
          <loc><?php echo base_url()."kategorien/".$categories_id ?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <?php 
       }
     ?> 
       <?php foreach($sub_categories as $sub_categorie) { 
        
        $sub_categories_id = $sub_categorie['sub_categories_id'];
 
  
      ?>
      <url>
          <loc><?php echo base_url()."home/sub_categories/".$sub_categories_id ?></loc>
          <changefreq>daily</changefreq>
          <priority>0.9</priority>
      </url>
      <?php 
       }
     ?> 
      <url>
          <loc><?php echo base_url()."home/blog_info"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.4</priority>
      </url>
      <url>
          <loc><?php echo base_url()."ueber-uns"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.4</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/faqs/users"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.4</priority>
      </url>
     
      <url>
          <loc><?php echo base_url()."home/contact_us"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.4</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/privacy_policy"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.4</priority>
      </url>
      <url>
          <loc><?php echo base_url()."home/imprints"?></loc>
          <changefreq>daily</changefreq>
          <priority>0.4</priority>
      </url>
      
</urlset>