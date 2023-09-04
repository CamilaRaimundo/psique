<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mural;

class ArtigosController extends Controller
{
    //addartigo e editartigo
    public function verificaForm(Request $req)
    {
        // Defina as regras de validação para os campos
        $rules = [
            'titulo_publicacao' => 'required',
            'autor_publicacao' => 'required|alpha',
            'link_publicacao' => 'url',
            'img_ilustrativa' => 'image|mimes:jpeg,jpg,png',
            'descricao_publicacao' => 'required',
        ];

        // Defina mensagens de erro personalizadas, se necessário
        $messages = [
            'titulo_publicacao.required' => 'O título da publicação é obrigatório.',
            'autor_publicacao.required' => 'O autor é obrigatório.',
            'link_publicacao.url' => 'O link deve ser uma URL válida.',
            'img_ilustrativa.image' => 'A imagem ilustrativa deve ser uma imagem válida.',
            'img_ilustrativa.mimes' => 'A imagem ilustrativa deve ser um arquivo JPEG, JPG ou PNG.',
            'descricao_publicacao.required' => 'A descrição é obrigatória.',
        ];

        // Valide os campos
        $validator = Validator::make($req->all(), $rules, $messages);

        // Redirecione de volta ao formulário se a validação falhar
        // if ($validator->fails()) {
        //     return redirect()->back()
        //       ->withErrors($validator)
        //         ->withInput();
        // }
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
    
        // Process and save data (if validation passes)
    
        return response()->json(['success' => true], 200);
    }
        // Se a validação passar, você pode processar e salvar os dados do formulário
        // no banco de dados ou em qualquer outra lógica relevante.

        // Redirecione para uma página de sucesso ou exiba uma mensagem de sucesso.
        //return redirect()->route('pages.psico.addartigo');
}
