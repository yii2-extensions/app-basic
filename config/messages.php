<?php

declare(strict_types=1);

/**
 * This is a configuration file for the [[\yii\console\controllers\MessageController]] console command.
 *
 * To update translations, run the following console command:
 * php yii message messages/config.php
 *
 * @see yii\console\controllers\MessageController
 */

return [
    // string, required, root directory of all source files
    'sourcePath' => '@app/src',
    // array, required, list of language codes that the extracted messages
    // should be translated to. For example, ['zh-CN', 'de'].
    'languages' => ['de', 'es', 'fr', 'pt', 'ru', 'zh'],
    // string, the name of the function for translating messages.
    // Defaults to 'Yii::t'. This is used as a mark to find the messages to be
    // translated. You may use a string for a single function name or an array for
    // multiple function names.
    'translator' => ['Yii::t'],
    // boolean, whether to sort messages by keys when merging new messages
    // with the existing ones. Defaults to false, which means the new (untranslated)
    // messages will be separated from the old (translated) ones.
    'sort' => true,
    // boolean, whether to remove messages that no longer appear in the source code.
    // Defaults to false, which means each of these messages will be enclosed with a pair of '@@' marks.
    'removeUnused' => false,
    // array, list of patterns that specify which files (not directories) should be processed.
    // If empty or not set, all files will be processed.
    // Please refer to "except" for details about the patterns.
    'only' => ['*.php'],
    // array, list of patterns that specify which files/directories shouldn't be processed.
    // If empty or not set, all files/directories will be processed.
    // A path matches a pattern if it contains the pattern string at its end. For example,
    // '/a/b' will match all files and directories ending with '/a/b';
    // the '*.svn' will match all files and directories whose name ends with '.svn'.
    // and the '.svn' will match all files and directories named exactly '.svn'.
    // Note, the '/' characters in a pattern matches both '/' and '\'.
    // See helpers/FileHelper::findFiles() description for more details on pattern matching rules.
    // If a file/directory matches both a pattern in "only" and "except", it will NOT be processed.
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hg',
        '.hgignore',
        '.hgkeep',
        '/messages',
        '/migrations',
    ],
    // 'php' output format is for saving messages to php files.
    'format' => 'php',
    // Root directory containing message translations.
    'messagePath' => '@resource/message',
    // boolean, whether the message file should be overwritten with the merged messages
    'overwrite' => true,
    // Message categories to ignore
    'ignoreCategories' => [
        'yii',
    ],
];
