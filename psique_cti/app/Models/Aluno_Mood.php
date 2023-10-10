<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno_Mood extends Model
{
    protected $table = 'aluno_mood';    //Aqui você define o nome da tabela, genericamente, o laravel
                                        //define por padrão o nome da tabela como sendo o nome da
                                        //classe no plural. Se quiser definir um, precisa por isso

    protected $primaryKey = ['data', 'ra', 'emocoes'];  //Isso aqui é uma definição de chave primária. Note que todas as variáveis
                                                        //padrão do laravel estão em pascal (primeira letra minúscula, primeira letra
                                                        //de cada palavra em maiúscula). Isso é uma definição de chave primária composta,
                                                        //se quiser ver um exemplo de chave comum, olha no Aluno.php.
                                                        //Detalhe, não é preciso colocar essas duas próximas linhas, o laravel cria
                                                        //automaticamente uma chave primária "id" que funciona como bigserial.

    public $incrementing = false;   //Essa linha se coloca junto com a de cima, ela seta a geração automática de 
                                    //id como falsa. Se não mexer nisso, a chave primária fica sendo gerada automaticamente
                                    //como o número de coisas que tu fez, bem pique programa do Bicudo no 2 ano

    protected $fillable = [ //Aqui não tem segredo, são os campos da tabela
        'data',
        'ra',
        'emocoes',
    ];

    public function aluno(): BelongsTo
    {
        //Essa funçãozinha transforma um campo em chave estrangeira. Se olhar em outros models, vai notar que
        //nem todos tem a herança da classe BelongsTo, HasOne, BelongsToMany ou HasMany. O motivo, sendo bem
        //sincero, eu não sei. Quer dizer, supostamente ele disponibiliza restrições e comportamentos adicionais,
        //o que eu não tenho ideia do que significa.
        return $this->belongsTo(Aluno::class, 'ra');
    }

}