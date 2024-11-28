<?php 
 
namespace App\Http\Controllers\Admin; 
 
use App\Models\Foto; 
use App\Models\Galery; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage; 
use App\Http\Controllers\Controller;
 
class FotoController extends Controller 
{ 
    // Display list of photos 
    public function index() 
    { 
        // Fetch all fotos along with their associated galery data 
        $fotos = Foto::with('galery')->get(); 
        return view('admin.foto.index', compact('fotos')); // Menggunakan view di dalam folder 'admin' 
    } 
 
    // Show form to add a new photo 
    public function create() 
    { 
        $galeries = Galery::all(); 
        return view('admin.foto.create', compact('galeries')); // Menggunakan view di dalam folder 'admin' 
    } 
 
    // Save new photo to the database 
    public function store(Request $request) 
    { 
        $request->validate([ 
            'galery_id' => 'required|exists:galery,id', 
            'file' => 'required|file|mimes:jpg,jpeg,png|max:2048', // Validate file 
            'judul' => 'required|string|max:255', 
        ]); 
 
        // Create storage directory if it doesn't exist
        $uploadPath = 'uploads/fotos';
        if (!Storage::disk('public')->exists($uploadPath)) {
            Storage::disk('public')->makeDirectory($uploadPath);
        }
 
        // Handle file upload with proper permissions
        $filePath = $request->file('file')->store($uploadPath, 'public');
 
        // Create the Foto record 
        Foto::create([ 
            'galery_id' => $request->galery_id, 
            'file' => $filePath, 
            'judul' => $request->judul, 
        ]); 
 
        return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil ditambahkan.'); 
    } 
 
    // Show form to edit an existing photo 
    public function edit($id) 
    { 
        $foto = Foto::findOrFail($id); 
        $galeries = Galery::all(); 
        return view('admin.foto.edit', compact('foto', 'galeries')); // Menggunakan view di dalam folder 'admin' 
    } 
 
    // Update an existing photo 
    public function update(Request $request, $id)
{
    // Cari foto yang akan diubah berdasarkan ID
    $foto = Foto::findOrFail($id);

    // Update judul foto
    $foto->judul = $request->input('judul');
    $foto->galery_id = $request->input('galery_id');  // Galeri yang dipilih

    // Jika ada file yang diupload
    if ($request->hasFile('file')) {
        // Hapus file lama (jika ada)
        if ($foto->file) {
            Storage::delete($foto->file);
        }

        // Simpan foto baru
        $filePath = $request->file('file')->store('public/fotos');  // menyimpan file
        $foto->file = $filePath;  // Update dengan path baru
    }

    // Simpan perubahan di database
    $foto->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil diperbarui.');
}

 
    // Delete a photo from the database 
    public function destroy($id) 
    { 
        $foto = Foto::findOrFail($id); 
 
        if (Storage::disk('public')->exists($foto->file)) { 
            Storage::disk('public')->delete($foto->file); 
        } 
 
        $foto->delete(); 
 
        return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil dihapus.'); 
    } 
}