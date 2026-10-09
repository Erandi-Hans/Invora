<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Single Ruled Exercise Book 80 Pages', 'code' => 'PRD-001', 'cost' => 120.00, 'price' => 135.00, 'quantity' => 100, 'description' => 'This book is 80 pages single page book with laser cover.'],
            ['name' => 'CR Book 200 Pages Ruled', 'code' => 'PRD-002', 'cost' => 350.00, 'price' => 420.00, 'quantity' => 75, 'description' => 'Hardbound 200 pages CR book suitable for office and school notes.'],
            ['name' => 'Ballpoint Pen Blue (Pack of 10)', 'code' => 'PRD-003', 'cost' => 250.00, 'price' => 300.00, 'quantity' => 150, 'description' => 'Smooth writing blue ballpoint pens with comfortable grip.'],
            ['name' => 'Ballpoint Pen Black (Pack of 10)', 'code' => 'PRD-004', 'cost' => 250.00, 'price' => 300.00, 'quantity' => 120, 'description' => 'Smooth writing black ballpoint pens for official documentation.'],
            ['name' => 'Mechanical Pencil 0.5mm', 'code' => 'PRD-005', 'cost' => 180.00, 'price' => 220.00, 'quantity' => 90, 'description' => 'Durable 0.5mm mechanical pencil with extra lead storage.'],
            ['name' => 'Eraser Dust-Free Large', 'code' => 'PRD-006', 'cost' => 40.00, 'price' => 60.00, 'quantity' => 200, 'description' => 'Soft eraser that leaves minimal dust and cleans cleanly.'],
            ['name' => 'Plastic Ruler 30cm', 'code' => 'PRD-007', 'cost' => 60.00, 'price' => 90.00, 'quantity' => 110, 'description' => 'Transparent 30cm plastic measuring ruler with clear markings.'],
            ['name' => 'Correction Pen Fluid', 'code' => 'PRD-008', 'cost' => 150.00, 'price' => 190.00, 'quantity' => 60, 'description' => 'Quick-drying correction fluid pen for neat corrections.'],
            ['name' => 'Permanent Marker Black', 'code' => 'PRD-009', 'cost' => 90.00, 'price' => 130.00, 'quantity' => 85, 'description' => 'Waterproof permanent marker for cardboard, plastic, and paper.'],
            ['name' => 'Whiteboard Marker Blue', 'code' => 'PRD-010', 'cost' => 100.00, 'price' => 140.00, 'quantity' => 70, 'description' => 'Easy-wipe whiteboard marker with vibrant blue ink.'],
            ['name' => 'A4 Photocopy Paper 80gsm (Ream)', 'code' => 'PRD-011', 'cost' => 1650.00, 'price' => 1950.00, 'quantity' => 40, 'description' => 'High brightness 80gsm A4 paper ream containing 500 sheets.'],
            ['name' => 'Sticky Notes 3x3 Yellow', 'code' => 'PRD-012', 'cost' => 120.00, 'price' => 170.00, 'quantity' => 130, 'description' => 'Self-adhesive sticky pads for quick reminders and messaging.'],
            ['name' => 'Highlighter Pastel Set (4 pcs)', 'code' => 'PRD-013', 'cost' => 280.00, 'price' => 350.00, 'quantity' => 95, 'description' => 'Set of 4 soft pastel highlighters for studying and office work.'],
            ['name' => 'Glue Stick 15g', 'code' => 'PRD-014', 'cost' => 80.00, 'price' => 120.00, 'quantity' => 100, 'description' => 'Non-toxic, washable strong adhesive glue stick.'],
            ['name' => 'Office Stapler Medium', 'code' => 'PRD-015', 'cost' => 320.00, 'price' => 400.00, 'quantity' => 45, 'description' => 'Durable metallic heavy-duty office stapler.'],
            ['name' => 'Staple Pins Box (No. 10)', 'code' => 'PRD-016', 'cost' => 50.00, 'price' => 80.00, 'quantity' => 250, 'description' => 'Standard box of rust-resistant staple wires.'],
            ['name' => 'Scissor Stainless Steel 6 inch', 'code' => 'PRD-017', 'cost' => 210.00, 'price' => 270.00, 'quantity' => 55, 'description' => 'Sharp stainless steel scissor with ergonomic comfortable handle.'],
            ['name' => 'Clear Folder Document Holder', 'code' => 'PRD-018', 'cost' => 70.00, 'price' => 110.00, 'quantity' => 180, 'description' => 'Transparent plastic file folder for document protection.'],
            ['name' => 'Ring Binder File A4', 'code' => 'PRD-019', 'cost' => 450.00, 'price' => 550.00, 'quantity' => 35, 'description' => 'Heavy-duty 2-ring binder file for corporate document archiving.'],
            ['name' => 'Calculator Scientific 10-Digit', 'code' => 'PRD-020', 'cost' => 1800.00, 'price' => 2200.00, 'quantity' => 25, 'description' => 'Advanced scientific calculator ideal for mathematics and accounting.'],
            ['name' => 'Desk Organizer Metal Mesh', 'code' => 'PRD-021', 'cost' => 750.00, 'price' => 950.00, 'quantity' => 20, 'description' => 'Black metal mesh multi-compartment desk pen and note organizer.'],
            ['name' => 'Correction Tape 12m', 'code' => 'PRD-022', 'cost' => 160.00, 'price' => 210.00, 'quantity' => 80, 'description' => 'Clean tear-resistant correction tape dispenser.'],
            ['name' => 'Drawing Book 40 Pages', 'code' => 'PRD-023', 'cost' => 140.00, 'price' => 180.00, 'quantity' => 90, 'description' => 'Unruled white drawing book for sketches and art work.'],
            ['name' => 'Color Pencils Set of 12', 'code' => 'PRD-024', 'cost' => 350.00, 'price' => 450.00, 'quantity' => 60, 'description' => 'Rich pigmented vibrant color pencils for kids and artists.'],
            ['name' => 'Water Color Paint Box 12 Colors', 'code' => 'PRD-025', 'cost' => 400.00, 'price' => 520.00, 'quantity' => 50, 'description' => 'Non-toxic watercolour cake palette with free brush.'],
            ['name' => 'Mathematical Instrument Box', 'code' => 'PRD-026', 'cost' => 550.00, 'price' => 690.00, 'quantity' => 40, 'description' => 'Complete geometry box with compass, divider, and protractor.'],
            ['name' => 'Notebook Spiral 120 Pages', 'code' => 'PRD-027', 'cost' => 220.00, 'price' => 290.00, 'quantity' => 110, 'description' => 'Flexible spiral-bound lined note pad for quick logging.'],
            ['name' => 'Index Cards Ruled (Pack of 100)', 'code' => 'PRD-028', 'cost' => 190.00, 'price' => 250.00, 'quantity' => 65, 'description' => 'Heavyweight index cards for study notes and categorizing.'],
            ['name' => 'Desk Calendar 2026', 'code' => 'PRD-029', 'cost' => 300.00, 'price' => 390.00, 'quantity' => 30, 'description' => 'Compact desktop standing planner calendar.'],
            ['name' => 'Paper Clips Steel (Box of 50)', 'code' => 'PRD-030', 'cost' => 60.00, 'price' => 90.00, 'quantity' => 150, 'description' => 'Rust-proof silver metal standard paper clips.'],
            ['name' => 'Push Pins Plastic Head (Box)', 'code' => 'PRD-031', 'cost' => 90.00, 'price' => 130.00, 'quantity' => 100, 'description' => 'Assorted color thumb tacks for notice boards.'],
            ['name' => 'Binder Clips 25mm (Box of 12)', 'code' => 'PRD-032', 'cost' => 150.00, 'price' => 200.00, 'quantity' => 85, 'description' => 'Strong grip black metal foldback binder clips.'],
            ['name' => 'Cutter Blade Knife Medium', 'code' => 'PRD-033', 'cost' => 110.00, 'price' => 160.00, 'quantity' => 70, 'description' => 'Retractable utility box cutter with safety lock.'],
            ['name' => 'Self-Inking Rubber Stamp Pad', 'code' => 'PRD-034', 'cost' => 250.00, 'price' => 330.00, 'quantity' => 40, 'description' => 'Long-lasting ink pad for official rubber stamps.'],
            ['name' => 'Envelopes Brown A4 (Pack of 10)', 'code' => 'PRD-035', 'cost' => 180.00, 'price' => 240.00, 'quantity' => 95, 'description' => 'Kraft paper mailing envelopes for secure document dispatch.'],
            ['name' => 'Envelopes White DL (Pack of 20)', 'code' => 'PRD-036', 'cost' => 130.00, 'price' => 180.00, 'quantity' => 110, 'description' => 'Standard business mailing white envelopes.'],
            ['name' => 'Thermal Receipt Roll 57mm', 'code' => 'PRD-037', 'cost' => 90.00, 'price' => 130.00, 'quantity' => 300, 'description' => 'BPA-free thermal paper rolls for POS machine receipt printing.'],
            ['name' => 'Thermal Receipt Roll 80mm', 'code' => 'PRD-038', 'cost' => 140.00, 'price' => 190.00, 'quantity' => 250, 'description' => 'Standard wide thermal rolls for billing counters.'],
            ['name' => 'ID Card Holder with Lanyard', 'code' => 'PRD-039', 'cost' => 120.00, 'price' => 170.00, 'quantity' => 140, 'description' => 'Clear plastic vertical badge holder with neck strap.'],
            ['name' => 'Desk Mouse Pad Ergonomic', 'code' => 'PRD-040', 'cost' => 350.00, 'price' => 450.00, 'quantity' => 60, 'description' => 'Smooth fabric surface mouse pad with rubber non-slip base.'],
            ['name' => 'USB Flash Drive 32GB', 'code' => 'PRD-041', 'cost' => 1250.00, 'price' => 1550.00, 'quantity' => 50, 'description' => 'High speed portable USB 3.0 storage data drive.'],
            ['name' => 'USB Flash Drive 64GB', 'code' => 'PRD-042', 'cost' => 1900.00, 'price' => 2350.00, 'quantity' => 45, 'description' => 'High capacity fast data transfer storage pendrive.'],
            ['name' => 'Permanent Marker Red', 'code' => 'PRD-043', 'cost' => 90.00, 'price' => 130.00, 'quantity' => 75, 'description' => 'Bold permanent marker with quick-drying red ink.'],
            ['name' => 'Permanent Marker Green', 'code' => 'PRD-044', 'cost' => 90.00, 'price' => 130.00, 'quantity' => 65, 'description' => 'Bold permanent marker with vibrant green ink.'],
            ['name' => 'Presentation File Clear Bag', 'code' => 'PRD-045', 'cost' => 85.00, 'price' => 125.00, 'quantity' => 130, 'description' => 'Snap-button plastic clear envelope file bag.'],
            ['name' => 'Punching Machine Single / Double', 'code' => 'PRD-046', 'cost' => 420.00, 'price' => 530.00, 'quantity' => 35, 'description' => 'Two-hole paper puncher with waste chip collector tray.'],
            ['name' => 'Packing Tape Transparent 2 Inch', 'code' => 'PRD-047', 'cost' => 220.00, 'price' => 290.00, 'quantity' => 90, 'description' => 'Strong adhesive packaging tape for carton sealing.'],
            ['name' => 'Masking Tape 1 Inch', 'code' => 'PRD-048', 'cost' => 130.00, 'price' => 170.00, 'quantity' => 80, 'description' => 'Easy-peel adhesive masking tape for labeling and painting.'],
            ['name' => 'Correction Fluid Bottle', 'code' => 'PRD-049', 'cost' => 140.00, 'price' => 180.00, 'quantity' => 70, 'description' => 'Brush applicator correction fluid bottle for paper correction.'],
            ['name' => 'Executive Notebook Hardcover A5', 'code' => 'PRD-050', 'cost' => 650.00, 'price' => 850.00, 'quantity' => 50, 'description' => 'Premium PU leather executive diary journal notebook.'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
