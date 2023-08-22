<?php

namespace App\Http\Controllers\Admin;

use DOMDocument;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données reçues
        $dataValidated = $request->validate([
            'title' => ['required', 'string'],
            'image' => ['required', 'image', 'max:2000'],
            'description' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ], [
            // Messages d'erreur personnalisés
            'title.required' => 'Le titre est obligatoire.',
            'image.required' => 'Une image est requise.',
            'image.image' => 'Le fichier doit être une image.',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.',
            'description.required' => 'La description est obligatoire.',
            'description.max' => 'La description ne doit pas dépasser 255 caractères.',
            'content.required' => 'Le contenu est obligatoire.',
        ]);

        // Création de l'article
        $post = Post::create(array_merge($dataValidated, ['slug' => Str::slug($dataValidated['title'])]));

        if (!$post) {
            return back()->with('error', 'Échec de l\'enregistrement, veuillez réessayer.');
        }

        // Traitement du contenu HTML
        $content = $dataValidated['content'];

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        if ($images = $dom->getElementsByTagName('img')) {
            foreach ($images as $key => $img) {
                $src = $img->getAttribute('src');
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "blog/" . $post->slug . '/content/' . time() . $key . '.png';
                Storage::disk('public')->put($image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', '/storage/' . $image_name);
                $img->setAttribute('class', 'img-fluid');
            }

            $content = $dom->saveHTML();
            $post->content = $content;
        }

        // Traitement de l'image de couverture
        $post->image = $dataValidated['image']->store('blog/' . $post->slug, 'public');
        $post->save();

        return redirect()->route('post.index')->with('success', 'Article publié avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $dataValidated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ], [
            // Messages d'erreur personnalisés
            'title.required' => 'Le titre est obligatoire.',
            'image.required' => 'Une image est requise.',
            'description.required' => 'La description est obligatoire.',
            'description.max' => 'La description ne doit pas dépasser 255 caractères.',
            'content.required' => 'Le contenu est obligatoire.',
        ]);

        $originalContent = $post->content; // Contenu d'origine
        $updatedContent = $dataValidated['content']; // Contenu mis à jour

        $originalDom = new DOMDocument();
        $originalDom->loadHTML($originalContent, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $updatedDom = new DOMDocument();
        $updatedDom->loadHTML('<?xml encoding="utf-8" ?>' .$updatedContent, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        // dd($updatedDom);


        $originalImages = $originalDom->getElementsByTagName('img');

        foreach ($originalImages as $img) {
            $src = $img->getAttribute('src');

            // Vérifier si l'image d'origine n'est pas présente dans le contenu mis à jour
            if (strpos($updatedContent, $src) === false) {
                // Supprimer l'image du stockage
                $imagePath = str_replace('/storage/', '', $src);
                Storage::disk('public')->delete($imagePath);
            }
        }

        $newImages = $updatedDom->getElementsByTagName('img');

        foreach ($newImages as $key => $img) {

            // Check if the image is a new one
            if (strpos($img->getAttribute('src'),'data:image/') === 0) {

                $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
                $image_name = "blog/". $post->slug.'/content/' . time(). $key.'.png';
                Storage::disk('public')->put($image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', '/storage/'.$image_name);
                $img->setAttribute('class', 'img-fluid');
            }
        }

        $dataValidated['content'] =  $updatedDom->saveHTML();

        $post->update($dataValidated);

        return to_route('post.index')->with('success', 'Articles Modifier');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $parentDirectory = dirname($post->image);

        Storage::disk('public')->deleteDirectory($parentDirectory);

        $post->delete();

        return to_route('post.index')->with('sucess', 'Articles publié');
    }

    public function publish(Post $post)
    {
        $post->published_at = now();
        $post->has_publish = 1;

        if(!$post->save()) {
            return back()->with('error', 'Echec, article non publié, Veuillez réessaiyer');
        }

        return to_route('post.index')->with('sucess', 'Articles publié');
    }

    public function unpublish(Post $post)
    {
        $post->has_publish = 0;

        if(!$post->save()) {
            return back()->with('error', 'Echec, article non Caché, Veuillez réessaiyer');
        }

        return to_route('post.index')->with('success', 'Articles cachés');
    }

    public function featured_image (Request $request, Post $post) {
        $data = $request->validate([
            'image' => ['required', 'image', 'max:2000']
        ]);

        Storage::disk('public')->delete($post->image);

        $post->image = $data['image']->store('blog/'. $post->slug, 'public');

         $post->save();

        return back();
    }
}
