<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records
        Blog::truncate();

        $default_carousels = array(
            [
                'title' => 'Post-Tensioning & LUCKNOW CONSTRUCTION – The Perfect Pair for Stronger Buildings',
                'content' => "<h3>🧩 Combining Strength with Speed</h3><p>In the construction world, speed and strength don't often go hand-in-hand. But by combining <strong>LUCKNOW CONSTRUCTION</strong> with <strong>Post-Tensioning</strong>, you get both — and much more.</p><h3>🏗️ What is Post-Tensioning?</h3><p>Post-tensioning is a structural system that strengthens concrete <strong>after it has been poured</strong>, using tensioned steel tendons. When paired with LUCKNOW CONSTRUCTION’s seamless formwork system, it creates <strong>stronger, lighter, and more flexible</strong> structures.</p><h3>🔍 How the Two Work Together</h3><ul><li>LUCKNOW CONSTRUCTION enables <strong>fast, monolithic casting</strong> of concrete walls and floors.</li><li>Post-tensioning improves the <strong>load-bearing capacity</strong> of slabs and beams.</li><li>Together, they create buildings with <strong>fewer columns</strong>, <strong>larger spans</strong>, and <strong>minimal cracking</strong>.</li></ul><h3>💡 Benefits for High-Rise and Commercial Projects</h3><ul><li>🔹 Reduced slab thickness</li><li>🔹 Faster floor cycles (1 floor in 5–7 days)</li><li>🔹 Open floor layouts (ideal for offices, showrooms, etc.)</li><li>🔹 Lower maintenance costs</li><li>🔹 Earthquake and vibration resistance</li></ul><h3>🧠 Smart Building, Smart Investment</h3><p>Whether you're constructing a <strong>residential tower</strong>, a <strong>commercial complex</strong>, or an <strong>industrial facility</strong>, this duo delivers unmatched value. With <strong>Construction LUCKNOW CONSTRUCTION</strong>, you benefit from advanced engineering, on-time delivery, and a commitment to quality.</p><h3>📞 Ready to Build the Future?</h3><p>Contact us today to learn how LUCKNOW CONSTRUCTION + Post-Tensioning can elevate your next project.</p>",
                'status' => 1,
            ],
            [
                'title' => 'Revolutionizing Construction with LUCKNOW CONSTRUCTION',
                'content' => "<h3>🏗️ The Future of Building Is Here</h3><p>In today's fast-paced world, the demand for <strong>efficient, durable, and cost-effective</strong> construction is higher than ever. Enter <strong>LUCKNOW CONSTRUCTION</strong> — a revolutionary technique transforming how we build residential and commercial spaces in India.</p><h3>🧱 What is LUCKNOW CONSTRUCTION?</h3><p>LUCKNOW CONSTRUCTION is a <strong>modern construction method</strong> that uses <strong>aluminum formwork</strong> to cast walls, slabs, and columns in one monolithic pour. It results in smooth, crack-free surfaces, stronger structures, and faster project delivery.</p><h3>⚡ Key Advantages of LUCKNOW CONSTRUCTION</h3><ul><li>✅ <strong>Speed</strong>: Complete projects 30–40% faster than traditional methods.</li><li>✅ <strong>Durability</strong>: Stronger, uniform concrete structures with fewer joints.</li><li>✅ <strong>Aesthetics</strong>: Smooth walls requiring minimal plastering or finishing.</li><li>✅ <strong>Economical</strong>: Reusable formwork and reduced labor costs.</li><li>✅ <strong>Sustainability</strong>: Lower material waste and energy use.</li></ul><h3>🏢 Perfect for Urban India</h3><p>With growing cities and rising demand for affordable housing, LUCKNOW CONSTRUCTION is ideal for:</p><ul><li>High-rise apartments</li><li>Mass housing schemes</li><li>Commercial office spaces</li><li>Institutional buildings</li></ul><h3>🛠️ Why Choose Us?</h3><p>At <strong>Construction LUCKNOW CONSTRUCTION</strong>, we have over 100 skilled professionals, cutting-edge equipment, and years of experience delivering LUCKNOW CONSTRUCTION-based projects across Bihar and beyond. Whether you're building homes, offices, or large-scale infrastructure—we deliver excellence, every time.</p><p>📞 <strong>Get in touch</strong> today to start your future-ready construction project.</p>",
                'status' => 1,
            ],

        );

        if (count($default_carousels) > 0) {
            foreach ($default_carousels as $carousel) {
                Blog::create($carousel);
            }
        }
    }
}
