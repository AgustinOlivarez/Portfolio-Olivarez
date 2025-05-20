<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ChatController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message');

        if (!$message) {
            return response()->json(['error' => 'No se recibió el mensaje'], 400);
        }

        $dataPath = storage_path('app/data/data.json');

        if (!File::exists($dataPath)) {
            return response()->json(['error' => 'No se encontró el archivo data.json'], 500);
        }

        $personalData = json_decode(File::get($dataPath), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Error al parsear data.json'], 500);
        }

        $systemPrompt = $this->buildSystemPrompt($personalData);

        try {
            $openai = \OpenAI::client(env('OPENAI_API_KEY'));

            $response = $openai->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $message],
                ],
                'max_tokens' => 300,
                'temperature' => 0.6,
            ]);

            $reply = $response['choices'][0]['message']['content'];

            return response()->json(['reply' => $reply]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al comunicarse con OpenAI: ' . $e->getMessage()
            ], 500);
        }
    }

private function buildSystemPrompt(array $data): string
{
    $prompt = "Sos una IA que conoce a Agustín Olivarez y te van a consultar sobre él para conocerlo y evaluar si es buen candidato para un trabajo. 
Respondé como si lo conocieras de toda la vida. Sé un poco informal pero respetuoso. 
Tu función es *presentar* a Agustín. No saludes y no te extiendas demasiado a menos que te lo pidan.\n\nDatos:\n";

    $prompt .= $this->arrayToString($data);

    return trim($prompt);
}

private function arrayToString(array $arr, int $level = 0): string
{
    $result = '';
    $indent = str_repeat('  ', $level);

    foreach ($arr as $key => $value) {
        $label = ucfirst(str_replace('_', ' ', $key));

        if (is_array($value)) {
            $result .= "$indent$label:\n";
            $result .= $this->arrayToString($value, $level + 1);
        } else {
            $result .= "$indent$label: $value\n";
        }
    }

    return $result;
}
}
