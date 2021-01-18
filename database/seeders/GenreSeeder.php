<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = collect([
            'Heavy Metal',
            'Speed Metal',
            'Thrash Metal',
            'Power Metal',
            'Death Metal',
            'Black Metall',
            'Pagan Metal',
            'Viking Metal',
            'Folk Metal',
            'Symphonic Metal',
            'Gothic Metal',
            'Glam Metal',
            'Hair Metal',
            'Doom Metal',
            'Groove Metal',
            'Industrial Metal',
            'Modern Metal',
            'Neoclassical Metal',
            'New Wave Of British Heavy Metal',
            'Post Metal',
            'Progressive Metal',

            'Acid Rock (with thanks to Alex Antonio)',
            'Adult-Oriented Rock (thanks to John Maher)',
            'Afro Punk',
            'Adult Alternative',
            'Alternative Rock (thx Caleb Browning)',
            'American Traditional Rock',
            'Anatolian Rock',
            'Arena Rock',
            'Art Rock',
            'Blues-Rock',
            'British Invasion',
            'Cock Rock',
            'Death Metal / Black Metal',
            'Doom Metal (thx Kevin G)',
            'Glam Rock',
            'Gothic Metal (fits here Sam DeRenzis – thx)',
            'Grind Core',
            'Hair Metal',
            'Hard Rock',
            'Math Metal (cheers Kevin)',
            'Math Rock (thx Ran’dom Haug)',
            'Metal',
            'Metal Core (thx Ran’dom Haug)',
            'Noise Rock (genre – Japanoise – thx Dominik Landahl)',
            'Jam Bands',
            'Post Punk (thx Ben Vee Bedlamite)',
            'Prog-Rock/Art Rock',
            'Progressive Metal (thx Ran’dom Haug)',
            'Psychedelic',
            'Rock & Roll',
            'Rockabilly (it’s here Mark Murdock!)',
            'Roots Rock',
            'Singer/Songwriter',
            'Southern Rock',
            'Spazzcore (thx Haug)',
            'Stoner Metal (duuuude)',
            'Surf',
            'Technical Death Metal (cheers Pierre)',
            'Tex-Mex',
            'Thrash Metal (thanks to Pierre A)',
            'Time Lord Rock (Trock) ~ (thanks to ‘Melia G)',
            'Trip-hop (Ta Will)'

        ]);

        $genres->each(function($genre){
            Genre::create([
                'name' => $genre,
                'slug' => Str::slug($genre)
            ]);
        });
    }
}
