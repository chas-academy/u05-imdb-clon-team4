<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=MovieSeeder
     *
     * @return void
     */
    public function run()
    {
        function base64FromFile($fileName)
        {
            $path = "seeder-images/$fileName.jpg";
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64String = base64_encode($data);
            return "data:image/$type;base64,$base64String";
        }

        $current_timestamp = DB::raw('CURRENT_TIMESTAMP');
        DB::table('movies')->insert([
            [
                'status_id' => 3,
                'title' => 'Raya and the Last Dragon',
                'description' => 'Long ago, in the fantasy world of Kumandra, humans and dragons lived together in harmony. But when an evil force threatened the land, the dragons sacrificed themselves to save humanity. Now, 500 years later, that same evil has returned and it’s up to a lone warrior, Raya, to track down the legendary last dragon to restore the fractured land and its divided people.',
                'year' => '2021-06-03',
                'image' => base64FromFile('raya-2021'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Zack Snyder\'s Justice League',
                'description' => 'Determined to ensure Superman\'s ultimate sacrifice was not in vain, Bruce Wayne aligns forces with Diana Prince with plans to recruit a team of metahumans to protect the world from an approaching threat of catastrophic proportions.',
                'year' => '2021-06-03',
                'image' => base64FromFile('justice-league-2021'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Shawshank Redemption',
                'description' => 'Framed in the 1940s for the double murder of his wife and her lover, upstanding banker Andy Dufresne begins a new life at the Shawshank prison, where he puts his accounting skills to work for an amoral warden. During his long stretch in prison, Dufresne comes to be admired by the other inmates -- including an older prisoner named Red -- for his integrity and unquenchable sense of hope.',
                'year' => '1994-09-23',
                'image' => base64FromFile('shawshank-redemption-the-1994'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Godfather',
                'description' => 'Spanning the years 1945 to 1955, a chronicle of the fictional Italian-American Corleone crime family. When organized crime family patriarch, Vito Corleone barely survives an attempt on his life, his youngest son, Michael steps in to take care of the would-be killers, launching a campaign of bloody revenge.',
                'year' => '1972-03-14',
                'image' => base64FromFile('godfather-the-1972'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Schindler\'s List',
                'description' => 'The true story of how businessman Oskar Schindler saved over a thousand Jewish lives from the Nazis while they worked as slaves in his factory during World War II.',
                'year' => '1993-02-04',
                'image' => base64FromFile('schindlers-list-1993'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Green Mile',
                'description' => 'A supernatural tale set on death row in a Southern prison, where gentle giant John Coffey possesses the mysterious power to heal people\'s ailments. When the cell block\'s head guard, Paul Edgecomb, recognizes Coffey\'s miraculous gift, he tries desperately to help stave off the condemned man\'s execution.',
                'year' => '1999-12-10',
                'image' => base64FromFile('green-mile-the-1999'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Spirited Away',
                'description' => 'A young girl, Chihiro, becomes trapped in a strange new world of spirits. When her parents undergo a mysterious transformation, she must call upon the courage she never knew she had to free her family.',
                'year' => '2001-07-20',
                'image' => base64FromFile('spirited-away-2001'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Godfather: Part II',
                'description' => 'In the continuing saga of the Corleone crime family, a young Vito Corleone grows up in Sicily and in 1910s New York. In the 1950s, Michael Corleone attempts to expand the family business into Las Vegas, Hollywood and Cuba.',
                'year' => '1974-12-20',
                'image' => base64FromFile('godfather-the-part-II-1974'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Pulp Fiction',
                'description' => 'A burger-loving hit man, his philosophical partner, a drug-addled gangster\'s moll and a washed-up boxer converge in this sprawling, comedic crime caper. Their adventures unfurl in three stories that ingeniously trip back and forth in time.',
                'year' => '1994-10-14',
                'image' => base64FromFile('pulp-fiction-1994'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Forrest Gump',
                'description' => 'A man with a low IQ has accomplished great things in his life and been present during significant historic events—in each case, far exceeding what anyone imagined he could do. But despite all he has achieved, his one true love eludes him.',
                'year' => '1994-07-06',
                'image' => base64FromFile('forrest-gump-1994'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Lord of the Rings: The Return of the King',
                'description' => 'Aragorn is revealed as the heir to the ancient kings as he, Gandalf and the other members of the broken fellowship struggle to save Gondor from Sauron\'s forces. Meanwhile, Frodo and Sam take the ring closer to the heart of Mordor, the dark lord\'s realm.',
                'year' => '2003-12-17',
                'image' => base64FromFile('lord-of-the-rings-the-return-of-the-king-the-2003'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Good, the Bad and the Ugly',
                'description' => 'While the Civil War rages between the Union and the Confederacy, three men – a quiet loner, a ruthless hit man and a Mexican bandit – comb the American Southwest in search of a strongbox containing $200,000 in stolen gold.',
                'year' => '1966-12-29',
                'image' => base64FromFile('good-the-bad-and-the-ugly-the-1966'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Once Upon a Time in America',
                'description' => 'A former Prohibition-era Jewish gangster returns to the Lower East Side of Manhattan over thirty years later, where he once again must confront the ghosts and regrets of his old life.',
                'year' => '1984-01-06',
                'image' => base64FromFile('once-upon-a-time-in-america-1984'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'GoodFellas',
                'description' => 'The true story of Henry Hill, a half-Irish, half-Sicilian Brooklyn kid who is adopted by neighbourhood gangsters at an early age and climbs the ranks of a Mafia family under the guidance of Jimmy Conway.',
                'year' => '1990-09-21',
                'image' => base64FromFile('good-fellas-1990'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Fight Club',
                'description' => 'A ticking-time-bomb insomniac and a slippery soap salesman channel primal male aggression into a shocking new form of therapy. Their concept catches on, with underground "fight clubs" forming in every town, until an eccentric gets in the way and ignites an out-of-control spiral toward oblivion.',
                'year' => '1999-10-15',
                'image' => base64FromFile('fight-club-1999'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'City of God',
                'description' => 'Buscapé was raised in a very violent environment. Despite the feeling that all odds were against him, he finds out that life can be seen with other eyes...',
                'year' => '2002-08-31',
                'image' => base64FromFile('city-of-god-2002'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'One Flew Over the Cuckoo\'s Nest',
                'description' => 'While serving time for insanity at a state mental hospital, implacable rabble-rouser, Randle Patrick McMurphy, inspires his fellow patients to rebel against the authoritarian rule of head nurse, Mildred Ratched.',
                'year' => '1975-11-18',
                'image' => base64FromFile('one-flew-over-the cuckoos-nest-1975'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'American History X',
                'description' => 'Derek Vineyard is paroled after serving 3 years in prison for killing two African-American men. Through his brother, Danny Vineyard\'s narration, we learn that before going to prison, Derek was a skinhead and the leader of a violent white supremacist gang that committed acts of racial crime throughout L.A. and his actions greatly influenced Danny. Reformed and fresh out of prison, Derek severs contact with the gang and becomes determined to keep Danny from going down the same violent path as he did.',
                'year' => '1998-11-20',
                'image' => base64FromFile('american-history-x-1998'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Inception',
                'description' => 'Cobb, a skilled thief who commits corporate espionage by infiltrating the subconscious of his targets is offered a chance to regain his old life as payment for a task considered to be impossible: "inception", the implantation of another person\'s idea into a target\'s subconscious.',
                'year' => '2010-07-16',
                'image' => base64FromFile('inception-2010'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Se7en',
                'description' => 'Two homicide detectives are on a desperate hunt for a serial killer whose crimes are based on the "seven deadly sins" in this dark and haunting film that takes viewers from the tortured remains of one victim to the next. The seasoned Det. Sommerset researches each sin in an effort to get inside the killer\'s mind, while his novice partner, Mills, scoffs at his efforts to unravel the case.',
                'year' => '1995-09-22',
                'image' => base64FromFile('se7en-1995'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Léon: The Professional',
                'description' => 'Léon, the top hit man in New York, has earned a rep as an effective "cleaner". But when his next-door neighbors are wiped out by a loose-cannon DEA agent, he becomes the unwilling custodian of 12-year-old Mathilda. Before long, Mathilda\'s thoughts turn to revenge, and she considers following in Léon\'s footsteps.',
                'year' => '1994-11-18',
                'image' => base64FromFile('leon-the-professional-1994'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Silence of the Lambs',
                'description' => 'Clarice Starling is a top student at the FBI\'s training academy. Jack Crawford wants Clarice to interview Dr. Hannibal Lecter, a brilliant psychiatrist who is also a violent psychopath, serving life behind bars for various acts of murder and cannibalism. Crawford believes that Lecter may have insight into a case and that Starling, as an attractive young woman, may be just the bait to draw him out.',
                'year' => '1991-02-14',
                'image' => base64FromFile('silence-of-the-lambs-the-1991'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Apocalypse Now',
                'description' => 'At the height of the Vietnam war, Captain Benjamin Willard is sent on a dangerous mission that, officially, "does not exist, nor will it ever exist." His goal is to locate - and eliminate - a mysterious Green Beret Colonel named Walter Kurtz, who has been leading his personal army on illegal guerrilla missions into enemy territory.',
                'year' => '1979-08-15',
                'image' => base64FromFile('apocalypse-now-1979'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Intouchables',
                'description' => 'A true story of two men who should never have met – a quadriplegic aristocrat who was injured in a paragliding accident and a young man from the projects.',
                'year' => '2011-11-02',
                'image' => base64FromFile('intouchables-the-2011'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'A Clockwork Orange',
                'description' => 'In a near-future Britain, young Alexander DeLarge and his pals get their kicks beating and raping anyone they please. When not destroying the lives of others, Alex swoons to the music of Beethoven. The state, eager to crack down on juvenile crime, gives an incarcerated Alex the option to undergo an invasive procedure that\'ll rob him of all personal agency. In a time when conscience is a commodity, can Alex change his tune?',
                'year' => '1971-12-19',
                'image' => base64FromFile('clockwork-orange-a-1971'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Usual Suspects',
                'description' => 'Held in an L.A. interrogation room, Verbal Kint attempts to convince the feds that a mythic crime lord, Keyser Soze, not only exists, but was also responsible for drawing him and his four partners into a multi-million dollar heist that ended with an explosion in San Pedro harbor – leaving few survivors. Verbal lures his interrogators with an incredible story of the crime lord\'s almost supernatural prowess.',
                'year' => '1995-09-15',
                'image' => base64FromFile('usual-suspects-the-1995'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Usual Suspects',
                'description' => 'Held in an L.A. interrogation room, Verbal Kint attempts to convince the feds that a mythic crime lord, Keyser Soze, not only exists, but was also responsible for drawing him and his four partners into a multi-million dollar heist that ended with an explosion in San Pedro harbor – leaving few survivors. Verbal lures his interrogators with an incredible story of the crime lord\'s almost supernatural prowess.',
                'year' => '1995-09-15',
                'image' => base64FromFile('usual-suspects-the-1995'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Godzilla',
                'description' => 'Ford Brody, a Navy bomb expert, has just reunited with his family in San Francisco when he is forced to go to Japan to help his estranged father, Joe. Soon, both men are swept up in an escalating crisis when an ancient alpha predator arises from the sea to combat malevolent adversaries that threaten the survival of humanity. The creatures leave colossal destruction in their wake, as they make their way toward their final battleground: San Francisco.',
                'year' => '2014-05-16',
                'image' => base64FromFile('godzilla-2014'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'The Birds',
                'description' => 'Chic socialite Melanie Daniels enjoys a passing flirtation with an eligible attorney in a San Francisco pet shop and, on an impulse, follows him to his hometown bearing a gift of lovebirds. But upon her arrival, the bird population runs amok. Suddenly, the townsfolk face a massive avian onslaught, with the feathered fiends inexplicably attacking people all over Bodega Bay.',
                'year' => '1963-03-29',
                'image' => base64FromFile('birds-the-1963'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'La Femme Nikita',
                'description' => 'A beautiful felon, sentenced to life in prison for the murder of a policeman, is given a second chance - as a secret political assassin controlled by the government.',
                'year' => '1991-01-04',
                'image' => base64FromFile('la-femme-nikita-1990'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Soul',
                'description' => 'Joe Gardner is a middle school teacher with a love for jazz music. After a successful gig at the Half Note Club, he suddenly gets into an accident that separates his soul from his body and is transported to the You Seminar, a center in which souls develop and gain passions before being transported to a newborn child. Joe must enlist help from the other souls-in-training, like 22, a soul who has spent eons in the You Seminar, in order to get back to Earth.',
                'year' => '2020-12-25',
                'image' => base64FromFile('soul-2020'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
        ]);
    }
}
