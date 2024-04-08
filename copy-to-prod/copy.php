<?php

// Diretório de origem e destino
$diretorioOrigem = '/caminho/para/o/diretorio/origem/';
$diretorioDestino = '/caminho/para/o/diretorio/destino/';

// Função para copiar arquivos
function copiarArquivos($origem, $destino)
{
    // Abre o diretório de origem
    $diretorio = opendir($origem);

    // Loop pelos arquivos do diretório
    while (false !== ($arquivo = readdir($diretorio))) {
        // Ignora arquivos especiais
        if ($arquivo != "." && $arquivo != "..") {
            // Se é um diretório, chama a função recursivamente
            if (is_dir($origem . $arquivo)) {
                copiarArquivos($origem . $arquivo . '/', $destino . $arquivo . '/');
            } else {
                // Copia o arquivo para o diretório de destino
                copy($origem . $arquivo, $destino . $arquivo);
            }
        }
    }

    // Fecha o diretório
    closedir($diretorio);
}

// Chama a função para copiar os arquivos
copiarArquivos($diretorioOrigem, $diretorioDestino);

echo "Arquivos copiados com sucesso!";
